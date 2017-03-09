<?php

namespace App\Http\Controllers\Webapp;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReciboOxxoPayController extends Controller
{
    public function __construct(Request $request)
    {
        $this->req = $request;
    }

    public function index($recibo)
    {
        $usuario = $this->req->user();

        if($recibo->usuario_id != $usuario->id){
            return redirect()->route('webapp.index');
        }

        $args = compact('recibo');
        return view('webapp.recibos.oxxopay', $args);
    }
}
