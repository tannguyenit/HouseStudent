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

    public function home(Request $request)
    {
        if ($request->ip() == '127.0.0.1') {
            $ip = config('constants.IP_DEFAULT');
        } else {
            $ip = $request->ip();
        }

        $url = str_replace('IP_change', $ip, config('constants.URL.GET_IP') . '/IP_change/json');
        try {
            $result = file_get_contents($url);
            $location = json_decode($result);
        } catch (Exception $e) {
            abort(404);
        }
        $relation = ['user', 'category', 'likes', 'firstImages', 'features'];
        $limit = config('setting.limit.news_post');

        $dataView['newsPost'] = $this->postRepository->getPost($limit, $relation);
        $dataView['topView'] = $this->postRepository->getPost($limit, $relation, 'total_view');
        $dataView['country'] = $this->postRepository->getCountry();
        $dataView['location'] = '';

        return view('home.index', $dataView);
    }
}
