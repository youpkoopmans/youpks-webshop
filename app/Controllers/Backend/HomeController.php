<?php

namespace App\Controllers\Backend;

use Illuminate\Contracts\Support\Renderable;
use App\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * HomeController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index()
    {
        return view('b:home::index');
    }
}
