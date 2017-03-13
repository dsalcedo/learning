<?php

namespace App\Http\Controllers\Website;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WebsiteController extends Controller
{
    public function index()
    {
        return view('website.index');
    }

    public function acceso()
    {
        return view('website.acceso');
    }

    public function privacidad()
    {
        return view('website.privacidad');
    }
}
