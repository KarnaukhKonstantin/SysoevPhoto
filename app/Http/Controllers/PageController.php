<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function landing()
    {
        return view('platform');
    }

    public function admin()
    {
        return view('admin');
    }
}
