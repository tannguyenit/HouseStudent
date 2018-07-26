<?php
namespace App\Http\Controllers;

use App\Models\Setting;

class BaseController extends Controller
{
    protected $dataView = [];
    protected $dataJson = [];
    public function __construct()
    {
        $setting = Setting::find('1');

        if ($setting && config('setting.maintenance') == $setting->maintenance) {
            return abort(503);
        }
    }
}
