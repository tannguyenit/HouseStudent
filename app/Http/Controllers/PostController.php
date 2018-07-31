<?php

namespace App\Http\Controllers;

use App\Http\Services\PostSeoService;
use App\Mail\RegisterAccount;
use App\Repositories\CategoryRepository\CategoryRepositoryInterface;
use App\Repositories\FeaturesRepository\FeaturesRepositoryInterface;
use App\Repositories\ImageRepository\ImageRepositoryInterface;
use App\Repositories\PostRepository\PostRepositoryInterface;
use App\Repositories\StatusRepository\StatusRepositoryInterface;
use App\Repositories\UserRepository\UserRepositoryInterface;
use Auth;
use DB;
use Event;
use Illuminate\Http\Request;
use Session;

class PostController extends BaseController
{
    protected $postRepository;
    protected $categoryRepository;
    protected $statusRepository;
    protected $imageRepository;
    protected $userRepository;
    protected $featuresRepository;
    /* @var PostSeoService $postSeoService*/
    protected $postSeoService;

    public function __construct(
        PostRepositoryInterface $postRepository,
        CategoryRepositoryInterface $categoryRepository,
        ImageRepositoryInterface $imageRepository,
        StatusRepositoryInterface $statusRepository,
        UserRepositoryInterface $userRepository
    ) {
        parent::__construct();
        $this->postRepository = $postRepository;
        $this->categoryRepository = $categoryRepository;
        $this->statusRepository = $statusRepository;
        $this->imageRepository = $imageRepository;
        $this->userRepository = $userRepository;
        $this->featuresRepository = app(FeaturesRepositoryInterface::class);
        $this->postSeoService = app(PostSeoService::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @param $slug
     * @return \Illuminate\Http\Response
     */
    public function townShip(Request $request, $slug)
    {
        $relationShip = ['user', 'category', 'status'];
        $getSortBy = $request->get('sortby');
        $sortBy = $this->postRepository->getSortBy($getSortBy);
        $dataView['posts'] = $this->postRepository->getDataByColumn($relationShip, 'township_slug', $slug, $sortBy, config('setting.limit.search'));
        $this->postSeoService->seoTowship($dataView['posts']);

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
     * @param  \Illuminate\Http\Request as Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $result = true;
            $data = $request->all();
            $fillable = $this->postRepository->getFillable();
            $attribute = array_only($data, $fillable);
            $attribute['price'] = setPrice($request->price);
            $attribute['township_slug'] = str_slug($request->administrative_area_level_2);
            $attribute['township'] = vn_to_str($request->administrative_area_level_2);
            $attribute['country'] = vn_to_str($request->administrative_area_level_1);
            $attribute['description'] = $request->description;
            $auth = Auth::user();
            /* ------------------------------------------------------------------------ */
            /*  Save Auth
            /* ------------------------------------------------------------------------ */
            if ($auth) {
                $attribute['user_id'] = $auth->id;
            } else {
                $fillableUser = $this->userRepository->getFillable();
                $attributeUser = array_only($data, $fillableUser);
                $user = $this->userRepository->create($attributeUser);
                $attribute['user_id'] = $user->id;
                /* ------------------------------------------------------------------------ */
                /*  Send mail to new user
                /* ------------------------------------------------------------------------ */
                $dataSend = [
                    'id' => $user->id,
                    'email' => $user->email,
                    'fullname' => $user->fullname,
                    'username' => $user->username,
                    'phone' => $user->phone,
                    'token' => $user->remember_token,
                ];

                \Mail::to($user->email)->send(new RegisterAccount($dataSend));
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
     * @param Request $request
     * @param $slug
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $slug)
    {
        $relationShip = ['user', 'likes', 'firstImages', 'images', 'category', 'features', 'comments' => function ($query) {
            $query->with('user')->get();
        }];
        $detailsPost = $this->postRepository->getDataBySlug($slug, $relationShip);

        if ($detailsPost) {
            if ($request->session()->has('arrRecently')) {
                $sessionData = $request->session()->get('arrRecently');

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
            /* ------------------------------------------------------------------------ */
            /*  Start update total view post-Table
            /* ------------------------------------------------------------------------ */
            Event::fire('posts.view', $detailsPost);

            $postVaribale = [
                'total_comment' => facebookComment(action('PostController@show', $slug)),
            ];

            $updatePost = $this->postRepository->update($postVaribale, $detailsPost->id);

            if (!$updatePost) {
                return abort(404);
            }
            /* ------------------------------------------------------------------------ */
            /*  End update total view post-Table
            /* ------------------------------------------------------------------------ */
            $id = $detailsPost->category->id;
            $limit = config('setting.limit.similar_post');
            $similarPost = $this->categoryRepository->getSimilarPost($id, $limit);
            $dataView['detailsPost'] = $detailsPost;
            $dataView['similarPost'] = $similarPost;
            $this->postSeoService->seoDetail($detailsPost);

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
            $relationship = ['images', 'category', 'status', 'features'];
            $dataView['types'] = $this->categoryRepository->all();
            $dataView['statuses'] = $this->statusRepository->all();
            $dataView['post'] = $this->postRepository->find($id, $relationship);

            return view('post.edit', $dataView);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request as Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            if ($id) {
                $result = true;
                $deleteFeatures = true;
                $data = $request->all();
                $fillable = $this->postRepository->getFillable();
                $attribute = array_only($data, $fillable);
                $attribute['price'] = setPrice($request->price);
                $attribute['township_slug'] = str_slug($request->administrative_area_level_2);
                $attribute['township'] = vn_to_str($request->administrative_area_level_2);
                $attribute['country'] = vn_to_str($request->administrative_area_level_1);
                $updatePost = $this->postRepository->update($attribute, $id, $slug = true);
                $detailPost = $this->postRepository->find($id, ['features']);

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
     * @return \Illuminate\Http\Response
     */
    public function search()
    {
        $getSortBy = app('request')->get('sortby');
        $sortBy = $this->postRepository->getSortBy($getSortBy);
        $dataSearch = app('request')->query();
        $dataView['dataSearch'] = $dataSearch;
        $dataView['searchs'] = $this->postRepository->getAllData($dataSearch, $sortBy, ['user', 'firstImages'])
            ->paginate(config('setting.limit.search'));

            return view('post.search', $dataView);
    }

    /**
     * Get My Property the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request as Request  $request
     * @return \Illuminate\Http\Response
     */
    public function myProperties(Request $request)
    {
        $relationShip = ['user', 'category', 'firstImages'];
        $getSortBy = $request->get('sortby');
        $sortBy = $this->postRepository->getSortBy($getSortBy);
        $myProperties = $this->postRepository->getMyProperties($relationShip, 'user_id', auth()->user()->id, $sortBy, config('setting.limit.my-properties'), true);

        if ($myProperties) {
            return view('author.my-properties', compact('myProperties'));
        }

        return abort(404);
    }
}
