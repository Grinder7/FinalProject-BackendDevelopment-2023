<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppController extends Controller
{
    public function home()
    {
        return view('pages.home');
    }
    public function aboutus()
    {
        return view('pages.aboutus');
    }
    public function checkout()
    {
        return view('pages.checkout');
    }
}
