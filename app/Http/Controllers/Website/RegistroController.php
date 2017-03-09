<?php

namespace App\Http\Controllers\Website;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegistroController extends Controller
{
    public function index()
    {
        return view('website.registro');
    }
}
