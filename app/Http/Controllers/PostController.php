<?php

namespace App\Http\Controllers;

use App\Repositories\ImageRepository\ImageRepository;
use App\Repositories\PostRepository\PostRepository;
use App\Repositories\StatusRepository\StatusRepository;
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
    protected $statusRepository;
    protected $imageRepository;
    protected $userRepository;

    public function __construct(
        PostRepository $postRepository,
        TypeRepository $typeRepository,
        ImageRepository $imageRepository,
        StatusRepository $statusRepository,
        UserRepository $userRepository
    ) {
        $this->postRepository   = $postRepository;
        $this->typeRepository   = $typeRepository;
        $this->statusRepository = $statusRepository;
        $this->imageRepository  = $imageRepository;
        $this->userRepository   = $userRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function townShip(Request $request, $slug)
    {
        $relationShip      = ['user', 'type', 'status'];
        $sortBy            = $this->postRepository->getSortBy(null);
        $dataView['posts'] = $this->postRepository->getDataByColumn($relationShip, 'township_slug', $slug, $sortBy, config('setting.limit.search'));

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
     * @param  \Illuminate\Http\Request as NewRequest  $request
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
            $attribute['price']         = setPrice($request->price);
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
                        $fileNew = time() . str_replace(' ', '-', $value);
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

                return redirect()->action('PostController@myProperties')
                    ->with('success', trans('validate.msg.create-success'));
            }

            if (auth()->check()) {
                return redirect()->action('PostController@myProperties')
                    ->with('error', trans('validate.msg.create-fail'));
            }

            return redirect()->action('HomeController@home')
                ->with('error', trans('validate.msg.create-fail'));
        } catch (Exception $e) {
            DB::rollback();

            if (auth()->check()) {
                return redirect()->action('PostController@myProperties')
                    ->with('error', trans('validate.msg.create-fail'));
            }

            return redirect()->action('HomeController@home')
                ->with('error', trans('validate.msg.create-fail'));
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

        $relationShip = ['user', 'likes', 'firstImages', 'images', 'type', 'features', 'comments' => function ($query) {
            $query->with('user')->get();
        }];
        $detailsPost = $this->postRepository->getDataBySlug($slug, $relationShip);

        if ($detailsPost) {
            if (Session::has('arrRecently')) {
                $sessionData = array_unique(Session::get('arrRecently'));

                foreach ($sessionData as $value) {
                    if ($value->id != $detailsPost->id) {
                        if (count($sessionData) >= 4) {
                            array_shift($sessionData);
                            break;
                        }
                        Session::push('arrRecently', $detailsPost);
                    }
                }
            } else {
                Session::push('arrRecently', $detailsPost);
            }

            $id                      = $detailsPost->type->id;
            $limit                   = config('setting.limit.similar_post');
            $similarPost             = $this->typeRepository->getSimilarPost($id, $limit);
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
        if ($id) {
            $relationship         = ['images', 'type', 'status', 'features'];
            $dataView['types']    = $this->typeRepository->all();
            $dataView['statuses'] = $this->statusRepository->all();
            $dataView['post']     = $this->postRepository->find($id, $relationship);

            return view('post.edit', $dataView);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request as NewRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(NewRequest $request, $id)
    {
        DB::beginTransaction();
        try {
            if ($id) {
                $result                     = true;
                $deleteFeatures             = true;
                $data                       = $request->all();
                $fillable                   = $this->postRepository->getFillable();
                $attribute                  = array_only($data, $fillable);
                $attribute['price']         = setPrice($request->price);
                $attribute['township_slug'] = str_slug($request->administrative_area_level_2);
                $attribute['township']      = $request->administrative_area_level_2;
                $attribute['country']       = $request->administrative_area_level_1;
                $updatePost                 = $this->postRepository->update($attribute, $id, $slug = true);
                $detailPost                 = $this->postRepository->find($id, ['features']);

                if (count($detailPost->features)) {
                    $deleteFeatures = $this->featuresRepository->deleteByColum('post_id', $id);
                }

                if ($updatePost && $deleteFeatures) {
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
                            if (!$detailPost->features()->createMany($featuresArray)) {
                                return $result = false;
                            };
                        }
                    }
                    /* ------------------------------------------------------------------------ */
                    /*  Save Files
                    /* ------------------------------------------------------------------------ */
                    $fileUpload = $request->file;
                    if ($fileUpload && "[]" != $fileUpload) {
                        $images = json_decode($fileUpload);

                        foreach ($images as $key => $value) {
                            $fileExists = strstr($value, config('path.post'));

                            if (!$fileExists) {
                                $fileNew = $this->imageRepository->addFile($value, $id);

                                if ($fileNew) {
                                    $moveFile = $this->imageRepository->moveImage($value, $fileNew, config('path.post'));

                                    if (!$moveFile) {
                                        $result = false;
                                    }
                                }
                            }
                        }
                    }
                }

                if ($result) {
                    DB::commit();

                    return redirect()->action('PostController@myProperties')
                        ->with('success', trans('validate.msg.edit-success'));
                } else {
                    return redirect()->action('PostController@myProperties')
                        ->with('error', trans('validate.msg.edit-fail'));
                }
            }
        } catch (Exception $e) {
            DB::rollback();

            return redirect()->action('PostController@myProperties')
                ->with('error', trans('validate.msg.edit-fail'));
        }
    }

    /**
     * Search the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search()
    {
        $getSortBy              = Request::get('sortby');
        $sortBy                 = $this->postRepository->getSortBy($getSortBy);
        $dataSearch             = Request::query();
        $dataView['dataSearch'] = $dataSearch;
        $dataView['searchs']    = $this->postRepository->getAllData($dataSearch, $sortBy, ['user', 'firstImages'])
            ->paginate(config('setting.limit.search'));

        return view('post.search', $dataView);
    }

    /**
     * Get My Property the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request as NewRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function myProperties(NewRequest $request)
    {
        $relationShip = ['user', 'type', 'firstImages'];
        $getSortBy    = $request->get('sortby');
        $sortBy       = $this->postRepository->getSortBy($getSortBy);
        $myProperties = $this->postRepository->getMyProperties($relationShip, 'user_id', auth()->user()->id, $sortBy, config('setting.limit.my-properties'));

        if ($myProperties) {
            return view('author.my-properties', compact('myProperties'));
        }

        return abort(404);
    }
}
