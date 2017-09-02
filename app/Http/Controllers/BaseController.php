<?php
namespace App\Http\Controllers;

use App\Models\Setting;

class BaseController extends Controller
{
    protected $dataView = [];
    protected $dataJson = [];
    public function __construct()
    {
        $setting = Setting::find('cb675bb9-8fc4-11e7-8201-74867a426052');

        if ($setting && config('setting.maintenance') == $setting->maintenance) {
            return abort(503);
        }
    }
}
