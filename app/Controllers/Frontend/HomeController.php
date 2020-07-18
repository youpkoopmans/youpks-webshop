<?php

namespace App\Controllers\Frontend;

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
        return view('f:home::index');
    }
}
