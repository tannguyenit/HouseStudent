<?php

namespace App\Http\Controllers;

use App\Repositories\PostRepository\PostRepository;
use App\Repositories\TypeRepository\TypeRepository;
use Request;
use Session;

class PostController extends BaseController
{
    protected $postRepository;
    protected $typeRepository;

    public function __construct(PostRepository $postRepository, TypeRepository $typeRepository)
    {
        $this->postRepository = $postRepository;
        $this->typeRepository = $typeRepository;
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
    public function store(Request $request)
    {
        $data = $request->all();
        dd($data);
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
