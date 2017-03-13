<?php

namespace App\Http\Controllers\Webapp;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;


class MiSuscripcionController extends Controller
{
    public function __construct(Request $request)
    {
        $this->req = $request;
    }

    public function index()
    {
        $usuario = $this->req->user();
        $carbon  = new Carbon();
        $args    = compact('usuario', 'carbon');
        return view('webapp.mi.suscripcion', $args);
    }
}
