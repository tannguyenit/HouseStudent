<?php

namespace App\Http\Controllers;

class PageController extends BaseController
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function about()
    {
        return view('page.about');
    }
}
