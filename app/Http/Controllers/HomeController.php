<?php

namespace App\Http\Controllers;

use App\Repositories\PostRepository\PostRepository;
use Illuminate\Http\Request;

class HomeController extends BaseController
{
    protected $postRepository;

    public function __construct(PostRepository $postRepository)
    {
        parent::__construct();
        $this->postRepository = $postRepository;
    }

    public function home(Request $request)
    {
        $ip = $request->ip();
        $url = str_replace('IP_change', $ip, 'https://ipapi.co/IP_change/json');
        $location = json_decode(file_get_contents($url));
        $relation = ['user', 'type', 'likes', 'firstImages', 'features'];
        $limit    = config('setting.limit.news_post');

        $dataView['newsPost'] = $this->postRepository->getPost($limit, $relation);
        $dataView['topView']  = $this->postRepository->getPost($limit, $relation, 'total_view');
        $dataView['country']  = $this->postRepository->getCountry();
        $dataView['location'] = $location;

        return view('home.index', $dataView);
    }
}
