<?php

namespace App\Http\Controllers;

use App\Repositories\CategoryRepository\CategoryRepositoryInterface;
use App\Repositories\PostRepository\PostRepositoryInterface;
use Illuminate\Http\Request;

class CategoryController extends BaseController
{
    protected $postRepository;
    protected $categoryRepository;

    public function __construct(
        PostRepositoryInterface $postRepository,
        CategoryRepositoryInterface $categoryRepository
    ) {
        $this->postRepository     = $postRepository;
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $slug)
    {
        $getSortBy         = $request->get('sortby');
        $sortBy            = $this->categoryRepository->getSortBy($getSortBy);
        $detailsTypes      = $this->categoryRepository->getDataBySlug($slug);
        $id                = $detailsTypes->id;
        $relationship      = ['user', 'category', 'images', 'features', 'firstImages'];
        $dataView['posts'] = $this->postRepository->getDataByColumn($relationship, 'category_id', $id, $sortBy, config('setting.limit.type'));

        if ($detailsTypes && $dataView['posts']) {
            $dataView['detailsTypes'] = $detailsTypes;

            return view('type.detail', $dataView);
        }

        return abort(404);
    }
}
