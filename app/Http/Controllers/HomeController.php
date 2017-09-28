<?php

namespace App\Http\Controllers;

use App\Repositories\PostRepository\PostRepository;

class HomeController extends BaseController
{
    protected $postRepository;

    public function __construct(PostRepository $postRepository)
    {
        parent::__construct();
        $this->postRepository = $postRepository;
    }

    public function home()
    {
        $relation = ['user', 'type', 'images', 'features'];
        $limit    = config('setting.limit.news_post');

        $dataView['newsPost'] = $this->postRepository->getPost($limit, $relation);
        $dataView['topView']  = $this->postRepository->getPost($limit, $relation, 'total_view');
        $dataView['country']  = $this->postRepository->getCountry();

        return view('home.index', $dataView);
    }
}
