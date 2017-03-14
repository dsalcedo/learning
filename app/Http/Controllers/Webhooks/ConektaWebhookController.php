<?php

namespace App\Http\Controllers\Webhooks;

use App\Modelos\Usuario\UsuarioOrdenes;
use Carbon\Carbon;
use Faker\Provider\Uuid;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use File;

class ConektaWebhookController extends Controller
{
    public function __construct(Request $request)
    {
        $this->req = $request;
    }

    public function index()
    {
        header('HTTP/1.1 200 OK');
        $body    = json_decode($this->req->getContent(), true);
        $payload = collect($body['data']['object']);

        $status = $payload->get('payment_status');
        $uid    = $payload->get('id');
        $orden  = UsuarioOrdenes::where('uid_transaccion',$uid)->first();

        if(!is_null( $orden )){

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

            $metodo = $orden->metodo_pago;
            $estado = $estados[$status];

            if($metodo == 'oxxo'){
                self::oxxoPay($orden, $status);
            }
        }

        //File::put(public_path().'/webhook/test.txt', $this->req->getContent());
        File::put(public_path().'/webhook/conektaLog.txt', $estado);
        return response('Webhook Handled', 200);
    }

    private function oxxoPay($orden, $estado)
    {
        $orden->estado_pago = $estado;

        if($estado == 'paid'){

            $orden->estado_interno = 'pagado';
            $orden->paid_at        = Carbon::now()->format('Y-m-d H:i:s');
            $orden->save();

            $suscripcion = $orden->getSuscripcion;
            $usuario     = $orden->getUsuario;
            $fecha       = Carbon::now()->addDays($suscripcion->duracion);

            $usuario->suscripciones()->create([
                'suscripcion_id' => $suscripcion->id,
                'orden_id'       => $orden->id,
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

        }elseif ($estado == 'expired'){

            $orden->estado_interno = 'cancelado';
            $orden->save();

        }else{

        }

    }
}
