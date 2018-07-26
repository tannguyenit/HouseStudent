<?php

namespace App\Http\Controllers;

use App\Http\Services\CategorySeoService;
use App\Repositories\CategoryRepository\CategoryRepositoryInterface;
use App\Repositories\PostRepository\PostRepositoryInterface;
use Illuminate\Http\Request;

class CategoryController extends BaseController
{
    protected $postRepository;
    protected $categoryRepository;
    /* @var CategorySeoService $categorySeoService*/
    protected $categorySeoService;

    /**
     * CategoryController constructor.
     * @param PostRepositoryInterface $postRepository
     * @param CategoryRepositoryInterface $categoryRepository
     */
    public function __construct(
        PostRepositoryInterface $postRepository,
        CategoryRepositoryInterface $categoryRepository
    ) {
        parent::__construct();
        $this->postRepository = $postRepository;
        $this->categoryRepository = $categoryRepository;
        $this->categorySeoService = app(CategorySeoService::class);
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
        $getSortBy = $request->get('sortby');
        $sortBy = $this->categoryRepository->getSortBy($getSortBy);
        $detailsTypes = $this->categoryRepository->getDataBySlug($slug);
        $id = $detailsTypes->id;
        $relationship = ['user', 'category', 'images', 'features', 'firstImages'];
        $dataView['posts'] = $this->postRepository->getDataByColumn($relationship, 'category_id', $id, $sortBy, config('setting.limit.type'));
        $this->categorySeoService->seoDetail($detailsTypes);

        if ($detailsTypes && $dataView['posts']) {
            $dataView['detailsTypes'] = $detailsTypes;

            return view('type.detail', $dataView);
        }

        return abort(404);
    }
}
