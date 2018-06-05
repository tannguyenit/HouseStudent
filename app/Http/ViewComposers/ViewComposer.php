<?php

namespace App\Http\ViewComposers;

use App\Repositories\CategoryRepository\CategoryRepository;
use App\Repositories\PostRepository\PostRepository;
use App\Repositories\SettingRepository\SettingRepository;
use App\Repositories\StatusRepository\StatusRepository;
use Illuminate\Contracts\View\View;

class ViewComposer
{

    protected $settingRepository;
    protected $categoryRepository;
    protected $statusRepository;
    protected $postRepository;

    public function __construct(
        SettingRepository $settingRepository,
        CategoryRepository $categoryRepository,
        StatusRepository $statusRepository,
        PostRepository $postRepository
    ) {
        $this->settingRepository  = $settingRepository;
        $this->categoryRepository = $categoryRepository;
        $this->statusRepository   = $statusRepository;
        $this->postRepository     = $postRepository;
    }

    public function compose(View $view)
    {
        $relationship                = ['posts'];
        $this->dataView['setting']   = $this->settingRepository->getSetting();
        $this->dataView['types']     = $this->categoryRepository->getData($relationship);
        $this->dataView['statuses']  = $this->statusRepository->getData();
        $this->dataView['township']  = $this->postRepository->getDataDistinct('township', 'country');
        $this->dataView['countries'] = $this->postRepository->getDataDistinct(null, 'country');
        $this->dataView['prices']    = $this->postRepository->getPrice();

        $view->with($this->dataView);
    }
}
