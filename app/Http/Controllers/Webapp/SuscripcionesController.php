<?php

namespace App\Http\Controllers\Webapp;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Conekta\Conekta;
use Conekta\Order;
use Carbon\Carbon;
use App\Modelos\Catalogo\Suscripciones;
use App\Modelos\MetodosPago\MetodoOxxo;
use App\Modelos\MetodosPago\MetodoTarjetas;
use Validator;
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

        $usuario = $this->req->user();

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

        $args = compact('usuario', 'suscripcion', 'metodo', 'tpl', 'meses');
        return view('webapp.suscripciones.compra', $args);
    }

    public function comprarSuscripcionGet($suscripcion, $clave, $metodo)
    {
        if(! in_array($metodo, ['visa', 'mastercard', 'oxxo']) ){
            return redirect()->route('webapp.suscripcion');
        }

        if(!$suscripcion->activo || !$suscripcion->publicado || $suscripcion->clave != $clave){
            return redirect()->route('webapp.suscripcion');
        }

        $usuario = $this->req->user();

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

        $args = compact('usuario', 'suscripcion', 'metodo', 'tpl', 'meses');
        return view('webapp.suscripciones.compra', $args);
    }

    public function procesarCompra($suscripcion, $metodoPago)
    {

        $validator = Validator::make($this->req->all(), [
            'nombre' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'telefono' => 'required|max:10',
            'direccion' => 'required|string|max:255',
            'ciudad' => 'required|string|max:255',
            'estado' => 'required|string|max:255',
            'codigo_postal' => 'required|max:10',
            'pais' => 'required|string|max:255',
            'metodo' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->route('get.comprar.suscripcion',[$suscripcion->id, $suscripcion->clave, $metodoPago])->withErrors($validator)->withInput();
        }

        if (is_null($metodoPago) || !in_array($metodoPago, ['visa', 'mastercard', 'oxxo'])) {
            return abort(404, 'Error, no se pudo completar esta transacción');
        }

        $usuario = $this->req->user();
        $metodo  = $this->req->get('metodo');

        Conekta::setApiKey(env('CONEKTA_PRIVATE'));
        Conekta::setApiVersion('2.0.0');
        Conekta::setLocale('es');

        $estados = [
            'pending_payment' => 'pendiente',
            'payment_pending' => 'pendiente',
            'declined'        => 'rechazado',
            'expired'         => 'cancelado',
            'paid'            => 'pagado',
            'refunded'        => 'rembolsado',
            'partially_refunded' => 'rembolsado',
            'charged_back'    => 'cancelado',
            'pre_authorized'  => 'pendiente',
            'voided'          => 'cancelado'
        ];

        $paymentOrder = [
            'amount'      => $suscripcion->costo * 100,
            'currency'    => 'mxn',
            'description' => $suscripcion->descripcion,
            'customer_info'     => [
                'name'  => $this->req->get('nombre'),
                'phone' => $this->req->get('telefono'),
                'email' => $this->req->get('email'),
            ],
            'line_items' => [
                [
                    'name'        => $suscripcion->nombre,
                    'description' => $suscripcion->descripcion,
                    'unit_price'  => $suscripcion->costo * 100,
                    'quantity'    => 1,
                    'sku'         => $suscripcion->clave
                ]
            ]
        ];
        
        if($metodoPago == 'oxxo'){
            $dias = Carbon::now()->addDays(15);
            $paymentOrder['charges'][] = [
                'payment_method' => [ // payment_source, payment_method
                    'type'       => 'oxxo_cash',
                    'expires_at' => strtotime($dias->format('Y-m-d 23:59:59'))
                ]
            ];
            
        }else{
            $paymentOrder['charges'][] = [
                'payment_method' => [
                    'token_id' => $this->req->get('card_token'),
                    'type'     => 'card'
                ]
            ];
        }

        $orden = Order::create($paymentOrder);
        $uid   = Uuid::generate(4);

        $uo = $usuario->ordenes()->create([
            'uid'             => $uid->string,
            'suscripcion_id'  => $suscripcion->id,
            'monto'           => $suscripcion->costo,
            'uid_transaccion' => $orden->id,
            'estado_interno'  => $estados[$orden->payment_status] ,
            'metodo_pago'     => $metodo,
            'emisor'          => ($metodo == 'oxxo') ? 'oxxo' : $orden->charges[0]->payment_method->brand,
            'estado_pago'     => $orden->payment_status,
            'paid_at'         => ($metodo == 'oxxo') ? null : Carbon::now()->format('Y-m-d H:i:s')
        ]);

        if($metodo == 'oxxo'){
            $recibo = MetodoOxxo::create([
                'usuario_id' => $usuario->id,
                'orden_id'   => $uo->id,
                'referencia' => $orden->charges[0]->payment_method->reference
            ]);

            return redirect()->route('webapp.recibo.oxxo', $recibo->id);
        }else{

            if( $orden->payment_status == 'paid'){
                MetodoTarjetas::create([
                    'usuario_id' => $usuario->id,
                    'orden_id'   => $uo->id,
                    'tarjeta_digitos' => $orden->charges[0]->payment_method->last4,
                    'brand'           => $orden->charges[0]->payment_method->brand,
                    'issuer'          => $orden->charges[0]->payment_method->issuer,
                    'type'            => $orden->charges[0]->payment_method->type
                ]);

                $fecha = Carbon::now()->addDays($suscripcion->duracion);
                $usuario->suscripciones()->create([
                    'suscripcion_id' => $suscripcion->id,
                    'orden_id'       => $uo->id,
                    'activo'         => true,
                    'expires_at'     => $fecha->format('Y-m-d 23:59:59')
                ]);

                if(is_null($usuario->premium_at)){
                    $usuario->premium_at = $fecha;
                }else{
                    $bdia  = Carbon::parse($usuario->premium_at);
                    $build = $bdia->addDays($suscripcion->duracion);
                    $usuario->premium_at = $build->format('Y-m-d 23:59:59');
                }

                $usuario->premium = true;
                $usuario->save();

            }else{
                dd($orden->payment_status);
            }
        }


        return redirect()->route('mi.suscripcion');

    }

}