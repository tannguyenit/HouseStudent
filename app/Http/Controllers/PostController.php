<?php

namespace App\Http\Controllers;

use App\Repositories\PostRepository\PostRepository;
use App\Repositories\TypeRepository\TypeRepository;
use App\Repositories\UserRepository\UserRepository;
use Auth;
use DB;
use Illuminate\Http\Request as NewRequest;
use Request;
use Session;

class PostController extends BaseController
{
    protected $postRepository;
    protected $typeRepository;
    protected $userRepository;

    public function __construct(
        PostRepository $postRepository,
        TypeRepository $typeRepository,
        UserRepository $userRepository
    ) {
        $this->postRepository = $postRepository;
        $this->typeRepository = $typeRepository;
        $this->userRepository = $userRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function townShip(Request $request, $slug)
    {
        $sortBy            = $this->postRepository->getSortBy(null);
        $dataView['posts'] = $this->postRepository->getDataByColumn('township_slug', $slug, $sortBy);

        if ($dataView['posts']) {
            return view('township.detail', $dataView);
        }

        return abort(404);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewRequest $request)
    {
        DB::beginTransaction();
        try {
            $result                     = true;
            $data                       = $request->all();
            $fillable                   = $this->postRepository->getFillable();
            $attribute                  = array_only($data, $fillable);
            $attribute['township_slug'] = str_slug($request->administrative_area_level_2);
            $attribute['township']      = $request->administrative_area_level_2;
            $attribute['country']       = $request->administrative_area_level_1;
            $attribute['description']   = $request->description;
            $auth                       = Auth::user();
            /* ------------------------------------------------------------------------ */
            /*  Save Auth
            /* ------------------------------------------------------------------------ */
            if ($auth) {
                $attribute['user_id'] = $auth->id;
            } else {
                $fillableUser         = $this->userRepository->getFillable();
                $attributeUser        = array_only($data, $fillableUser);
                $user                 = $this->userRepository->create($attributeUser);
                $attribute['user_id'] = $user->id;
            }

            $savePost = $this->postRepository->create($attribute);
            if ($savePost) {
                /* ------------------------------------------------------------------------ */
                /*  Save Features
                /* ------------------------------------------------------------------------ */
                $features = $request->additional_features;

                if ($features) {
                    $featuresArray = [];
                    foreach ($features as $key => $element) {
                        if ($element['key'] && $element['value']) {
                            $featuresArray[$key]['title'] = $element['key'];
                            $featuresArray[$key]['value'] = $element['value'];
                        }
                    }
                    if (count($featuresArray)) {
                        if (!$savePost->features()->createMany($featuresArray)) {
                            return $result = false;
                        };
                    }
                }

                /* ------------------------------------------------------------------------ */
                /*  Save Files
                /* ------------------------------------------------------------------------ */
                if ($request->file && "[]" != $request->file) {
                    $FileArray = json_decode($request->file);

                    foreach ($FileArray as $key => $value) {
                        $fileNew = time() . $value;
                        $this->postRepository->moveImage($value, $fileNew, config('path.post'));
                        $filesArray[]['image'] = $fileNew;
                    }

                    if (!$savePost->images()->createMany($filesArray)) {
                        return $result = false;
                    };
                }
            } else {
                $result = false;
            }
            if ($result) {
                DB::commit();
                if (!$auth) {
                    $user = $this->userRepository->find($savePost->user_id);
                    Auth::login($user);
                }

                return redirect()->action('HomeController@home')
                    ->with('success', trans('message.create_successful'));
            }
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->action('HomeController@home')
                ->with('error', trans('message.create_successful'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $slug)
    {

        $relationShip = ['user', 'likes', 'images', 'type', 'comments' => function ($query) {
            $query->with('user')->get();
        }];
        $detailsPost = $this->postRepository->getDataBySlug($slug, $relationShip);
        if (Session::has('arrRecently')) {
            $sessionData = Session::get('arrRecently');

            foreach ($sessionData as $value) {
                if ($value->id != $detailsPost->id) {
                    if (count($sessionData) >= 4) {
                        break;
                    }
                    Session::push('arrRecently', $detailsPost);
                }
            }
        } else {
            Session::push('arrRecently', $detailsPost);
        }

        $id          = $detailsPost->type->id;
        $limit       = config('setting.limit.similar_post');
        $similarPost = $this->typeRepository->getSimilarPost($id, $limit);

        if ($detailsPost) {
            $dataView['detailsPost'] = $detailsPost;
            $dataView['similarPost'] = $similarPost;

            return view('post.detail', $dataView);
        }

        return abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function search()
    {
        $getSortBy              = Request::get('sortby');
        $sortBy                 = $this->postRepository->getSortBy($getSortBy);
        $dataSearch             = Request::query();
        $dataView['dataSearch'] = $dataSearch;
        $dataView['searchs']    = $this->postRepository->getAllData($dataSearch, $sortBy, ['user'])
            ->paginate(config('setting.limit.search'));

        return view('post.search', $dataView);
    }
}
