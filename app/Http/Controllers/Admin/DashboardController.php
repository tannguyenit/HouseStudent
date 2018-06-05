<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\CategoryRepository\CategoryRepositoryInterface;
use App\Repositories\PostRepository\PostRepositoryInterface;
use App\Repositories\StatusRepository\StatusRepositoryInterface;
use App\Repositories\UserRepository\UserRepositoryInterface;
use File;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    protected $statusRepository;
    protected $postRepository;
    protected $categoryRepository;
    protected $userRepository;

    public function __construct(
        StatusRepositoryInterface $statusRepository,
        PostRepositoryInterface $postRepository,
        CategoryRepositoryInterface $categoryRepository,
        UserRepositoryInterface $userRepository
    ) {
        $this->postRepository     = $postRepository;
        $this->statusRepository   = $statusRepository;
        $this->categoryRepository = $categoryRepository;
        $this->userRepository     = $userRepository;
    }

    public function dashboard()
    {
        $dataView['users']  = $this->userRepository->getStatistic();
        $dataView['type']   = $this->categoryRepository->getStatistic();
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
