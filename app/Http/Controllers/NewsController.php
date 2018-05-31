<?php

namespace App\Http\Controllers;

use App\Repositories\PostRepository\PostRepository;
use App\Repositories\TypeRepository\TypeRepository;

class NewsController extends BaseController
{
    protected $postRepository;
    protected $typeRepository;

    public function __construct(
        PostRepository $postRepository,
        TypeRepository $typeRepository
    ) {
        $this->postRepository = $postRepository;
        $this->typeRepository = $typeRepository;
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
