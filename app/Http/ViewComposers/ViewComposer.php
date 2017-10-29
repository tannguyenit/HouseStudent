<?php

namespace App\Http\ViewComposers;

use App\Repositories\PostRepository\PostRepository;
use App\Repositories\SettingRepository\SettingRepository;
use App\Repositories\StatusRepository\StatusRepository;
use App\Repositories\TypeRepository\TypeRepository;
use Illuminate\Contracts\View\View;

class ViewComposer
{

    protected $settingRepository;
    protected $typeRepository;
    protected $statusRepository;
    protected $postRepository;

    public function __construct(
        SettingRepository $settingRepository,
        TypeRepository $typeRepository,
        StatusRepository $statusRepository,
        PostRepository $postRepository
    ) {
        $this->settingRepository = $settingRepository;
        $this->typeRepository    = $typeRepository;
        $this->statusRepository  = $statusRepository;
        $this->postRepository    = $postRepository;
    }

    public function compose(View $view)
    {
        $relationship                = ['posts'];
        $this->dataView['setting']   = $this->settingRepository->getSetting();
        $this->dataView['types']     = $this->typeRepository->getData($relationship);
        $this->dataView['statuses']  = $this->statusRepository->getData();
        $this->dataView['township']  = $this->postRepository->getDataDistinct('township', 'country');
        $this->dataView['countries'] = $this->postRepository->getDataDistinct(null, 'country');
        $this->dataView['prices']    = $this->postRepository->getPrice();

        $view->with($this->dataView);
    }
}
