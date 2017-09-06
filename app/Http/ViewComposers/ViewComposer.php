<?php

namespace App\Http\ViewComposers;

use App\Repositories\SettingRepository\SettingRepository;
use App\Repositories\TypeRepository\TypeRepository;
use Illuminate\Contracts\View\View;

class ViewComposer
{

    protected $settingRepository;
    protected $typeRepository;

    public function __construct(
        SettingRepository $settingRepository,
        TypeRepository $typeRepository
    ) {
        $this->settingRepository = $settingRepository;
        $this->typeRepository    = $typeRepository;
    }

    public function compose(View $view)
    {
        $this->dataView['setting'] = $this->settingRepository->getSetting();
        $this->dataView['types']   = $this->typeRepository->all();

        $view->with($this->dataView);
    }
}
