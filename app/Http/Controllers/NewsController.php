<?php

namespace App\Http\Controllers;

use App\Repositories\CategoryRepository\CategoryRepositoryInterface;
use App\Repositories\PostRepository\PostRepositoryInterface;

class NewsController extends BaseController
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return abort(404);
    }
}
