<?php

namespace App\Http\Controllers\Webapp;

use App\Modelos\Catalogo\Suscripciones;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Conekta\Conekta;
use Conekta\Order;
use Conekta\Charge;
use Conekta\Conekta_Customer;
use Carbon\Carbon;
use Uuid;

class SuscripcionesController extends Controller
{
    public function __construct(Request $request)
    {
        $this->req = $request;
    }

    public function index()
    {
        $suscripciones = Suscripciones::where(['activo'=>true, 'publicado'=>true])->get();
        $args = compact('suscripciones');
        return view('webapp.suscripciones.index', $args);
    }

    public function comprarSuscripcion($suscripcion, $clave)
    {

        $this->validate($this->req, [
            'metodo' =>'required|min:3|max:10|string'
        ]);

        $metodo = $this->req->get('metodo');
        if(! in_array($metodo, ['visa', 'mastercard', 'oxxo']) ){
            return redirect()->back();
        }

        if(!$suscripcion->activo || !$suscripcion->publicado || $suscripcion->clave != $clave){
            return redirect()->back();
        }

        if( in_array($metodo, ['visa', 'mastercard']) ){
            $tpl = 'tarjeta';
        }else{
            $tpl = 'oxxo';
        }

        $meses = [
            '00' => 'Mes',
            '01' => '01',
            '02' => '02',
            '03' => '03',
            '04' => '04',
            '05' => '05',
            '06' => '06',
            '07' => '07',
            '08' => '08',
            '09' => '09',
            '10' => '10',
            '11' => '11',
            '12' => '12'
        ];

        $args = compact('suscripcion', 'metodo', 'tpl', 'meses');
        return view('webapp.suscripciones.compra', $args);
    }

    public function procesarCompra($suscripcion, $metodo)
    {
        if(is_null( $metodo ) || ! in_array($metodo, ['visa', 'mastercard', 'oxxo']) ){
            return abort(404, 'Error, no se pudo completar esta transacción');
        }

        Conekta::setApiKey(env('CONEKTA_PRIVATE'));
        Conekta::setApiVersion('2.0.0');
        Conekta::setLocale('es');

        $exp = Carbon::now()->addWeek();

        dd( );

        $valid_order =
            array(
                'line_items' =>[
                    [
                        'name' => $suscripcion->nombre,
                        'description' => $suscripcion->descripcion,
                        'unit_price'  => $suscripcion->costo * 100,
                        'quantity'    => 1,
                        'sku' => $suscripcion->clave
                    ]
                ],
                'currency' => 'mxn',
                'charges'  => [
                    [
                        'payment_source' => [
                            'type'       => ($metodo == 'oxxo') ? 'oxxo_cash' : 'card',
                            'expires_at' => strtotime ($exp->format('Y-m-d 23:59:59') )
                        ],
                        'amount' =>  $suscripcion->costo * 100
                    ]
                ],
                'customer_info' => array(
                    'name'  => $this->req->get('nombre'),
                    'phone' => '+5213353319758',
                    'email' => $this->req->get('email'),
                    'customer_id' => 1,
                )
            );

        $uid = Uuid::generate(4);

        dd($this->req->all());

        $orden = [
            'reference_id' => $uid->string,
            'card'     => $this->req->get('card_token'),
            'amount'   => $suscripcion->costo * 100,
            'currency' => 'mxn',
            'description' => $suscripcion->descripcion,
            'details' => [
                'name'  => $this->req->get('nombre'),
                'email' => $this->req->get('email'),
                'address' => [
                    'street1' => $this->req->get('direccion'),
                    'city'    => $this->req->get('ciudad'),
                    'state'   => $this->req->get('estado'),
                    'country' => $this->req->get('pais'),
                    'postal_code' => $this->req->get('codigo_postal')
                ],
                'line_items' =>[
                    [
                        'name' => $suscripcion->nombre,
                        'description' => $suscripcion->descripcion,
                        'unit_price'  => $suscripcion->costo * 100,
                        'quantity'    => 1
                    ]
                ],
            ]
        ];

        Charge::create($orden);

        if($metodo == 'oxxo'){




        }else{



            dd($this->req->all());
            Order::create([
                'line_items' =>[
                    [
                        'name' => $suscripcion->nombre,
                        'description' => $suscripcion->descripcion,
                        'unit_price'  => $suscripcion->costo * 100,
                        'quantity'    => 1
                    ]
                ],
                'charges' => [
                    [
                        'payment_method' => [ 'type' => 'default' ]
                    ]
                ],

                'customer_info' => [
                    'customer_id' => 1, // TODO AGREGAR ID DE USUARIO
                    'name' => $this->req->get('nombre'),
                    'email' => $this->req->get('email')
                ]
            ]);

        }

        dd($suscripcion, $metodo);
    }

}