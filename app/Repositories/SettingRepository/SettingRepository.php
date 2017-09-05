<?php
namespace App\Repositories\SettingRepository;

use App\Models\Setting;
use App\Repositories\BaseRepository;
use App\Repositories\SettingRepository\SettingRepositoryInterface;

class SettingRepository extends BaseRepository implements SettingRepositoryInterface
{

    public function model()
    {
        return Setting::class;
    }

    public function getSetting()
    {
        return $this->model->orderBy('created_at', 'DESC')->limit(1)->first();
    }
}
