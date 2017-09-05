<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Repositories\SettingRepository\SettingRepository;
use Illuminate\Http\Request;

class SettingController extends BaseController
{
    protected $settingRepository;

    public function __construct(SettingRepository $settingRepository)
    {
        $this->settingRepository = $settingRepository;
    }

    public function index()
    {
        $dataView['setting'] = $this->settingRepository->getSetting();

        return view('admin.setting', $dataView);
    }

    public function update(Request $request, $id)
    {

        $data      = $request->all();
        $fillable  = $this->settingRepository->getFillable();
        $attribute = array_only($data, $fillable);

        if ($request->logo) {
            $attribute['logo'] = $this->settingRepository->uploadImage($request->logo, config('path.logo'));
        }

        $update = $this->settingRepository->update($attribute, $id);

        if ($update) {
            return redirect()->action('Admin\SettingController@index')->with([
                'status' => true,
                'msg'    => 'update thanh cong',
            ]);
        } else {
            return redirect()->action('Admin\SettingController@index')->with([
                'status' => true,
                'msg'    => 'update that bai',
            ]);
        }
    }
}
