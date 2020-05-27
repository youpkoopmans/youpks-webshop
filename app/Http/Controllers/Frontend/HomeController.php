<?php

namespace App\Http\Controllers\Frontend;


use Illuminate\Contracts\Support\Renderable;

class HomeController
{
    /**
     * Show the home page.
     *
     * @return Renderable
     */
    public function index()
    {
        return view('frontend.pages.home.index');
    }
}
