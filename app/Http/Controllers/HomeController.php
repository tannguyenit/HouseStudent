<?php

namespace App\Http\Controllers;

use App\Repositories\PostRepository\PostRepositoryInterface;
use Illuminate\Http\Request;

class HomeController extends BaseController
{
    protected $postRepository;

    public function __construct(PostRepositoryInterface $postRepository)
    {
        parent::__construct();
        $this->postRepository = $postRepository;
    }

    public function home()
    {
        $relation = ['user', 'category', 'likes', 'firstImages', 'features'];
        $limit = config('setting.limit.news_post');

        $dataView['newsPost'] = $this->postRepository->getPost($limit, $relation);
        $dataView['topView'] = $this->postRepository->getPost($limit, $relation, 'total_view');
        $dataView['country'] = $this->postRepository->getCountry();
        $dataView['location'] = '';

        return view('home.index', $dataView);
    }
}
