<?php

namespace App\Http\Controllers\Frontend;


class HomeController
{
    /**
     * Show the home page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('frontend.pages.home.index');
    }
}
