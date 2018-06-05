<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\SettingRepository\SettingRepositoryInterface;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    protected $settingRepository;

    public function __construct(SettingRepositoryInterface $settingRepository)
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
            return redirect()->action('Admin\SettingController@index')
                ->with('success', trans('validate.msg.edit-success'));
        } else {
            return redirect()->action('Admin\SettingController@index')
                ->with('errors', trans('validate.msg.edit-fail'));
        }
    }

    public function save(Request $request)
    {

        $data      = $request->all();
        $fillable  = $this->settingRepository->getFillable();
        $attribute = array_only($data, $fillable);

        if ($request->logo) {
            $attribute['logo'] = $this->settingRepository->uploadImage($request->logo, config('path.logo'));
        }

        $create = $this->settingRepository->create($attribute);

        if ($create) {
            return redirect()->action('Admin\SettingController@index')
                ->with('success', trans('validate.msg.create-success'));
        } else {
            return redirect()->action('Admin\SettingController@index')
                ->with('errors', trans('validate.msg.create-fail'));
        }
    }
}
