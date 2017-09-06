<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\PostRepository\PostRepository;
use App\Repositories\StatusRepository\StatusRepository;
use App\Repositories\TypeRepository\TypeRepository;
use App\Repositories\UserRepository\UserRepository;
use File;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    protected $statusRepository;
    protected $postRepository;
    protected $typeRepository;
    protected $userRepository;

    public function __construct(
        StatusRepository $statusRepository,
        PostRepository $postRepository,
        TypeRepository $typeRepository,
        UserRepository $userRepository
    ) {
        $this->postRepository   = $postRepository;
        $this->statusRepository = $statusRepository;
        $this->typeRepository   = $typeRepository;
        $this->userRepository   = $userRepository;
    }

    public function dashboard()
    {
        $dataView['users']  = $this->userRepository->getStatistic();
        $dataView['type']   = $this->typeRepository->getStatistic();
        $dataView['status'] = $this->statusRepository->getStatistic();
        $dataView['posts']  = $this->postRepository->getStatistic();

        return view('admin.dashboard', $dataView);
    }

    public function getEnv()
    {
        $env = File::get(base_path('.env'));

        return view('admin.env', compact('env'));
    }

    public function saveEnv(Request $request)
    {
        $env = $request->env;
        file_put_contents(base_path('.env'), $env);

        return redirect()->action('Admin\DashboardController@getEnv');
    }
}
