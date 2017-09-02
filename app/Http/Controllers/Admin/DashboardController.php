<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;

class DashboardController extends BaseController
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }
}
