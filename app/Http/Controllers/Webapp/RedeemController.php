<?php

namespace App\Http\Controllers\Webapp;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modelos\Catalogo\Suscripciones;
use Uuid;
use Carbon\Carbon;

class RedeemController extends Controller
{
    public function __construct(Request $req)
    {
        $this->req = $req;
    }

    public function index()
    {
        return view('webapp.redeem.index');
    }

    public function store()
    {
        $this->validate($this->req, [
            'redeem' => 'required|min:3|max:255'
        ]);

        $codigo = $this->req->get('redeem');
        $suscripcion = Suscripciones::where(['clave' => $codigo, 'activo' => true, 'publicado'=> false])->first();

        if(is_null($suscripcion)){
            return redirect()->back()->with('alerta', 'El código ingresado no existe');
        }

        $usuario = $this->req->user();

        if(!$suscripcion->verificacion){

            $usus = $usuario->suscripciones()->where('suscripcion_id', $suscripcion->id)->first();

            if(!is_null($usus)){
                return redirect()->back()->with('alerta', 'El código "'.$codigo.'" ya ha sido activado anteriormente. Solo puedes usar el código una vez.');
            }

            $uid= Uuid::generate(4);
            $uo = $usuario->ordenes()->create([
                'uid'             => $uid->string,
                'suscripcion_id'  => $suscripcion->id,
                'monto'           => $suscripcion->costo,
                'uid_transaccion' => null,
                'estado_interno'  => 'pagado',
                'metodo_pago'     => 'cortesia',
                'emisor'          => 'cortesia',
                'estado_pago'     => 'paid',
                'paid_at'         => Carbon::now()->format('Y-m-d H:i:s')
            ]);

            $fecha = Carbon::now()->addDays($suscripcion->duracion);
            $usuario->suscripciones()->create([
                'suscripcion_id' => $suscripcion->id,
                'orden_id'       => $uo->id,
                'activo'         => true,
                'expires_at'     => $fecha->format('Y-m-d 23:59:59')
            ]);

            if(is_null($usuario->premium_at)){
                $usuario->premium_at = $fecha->format('Y-m-d 23:59:59');
            }else{
                $f = carbon::parse($usuario->premium_at)->addDays($suscripcion->duracion)->format('Y-m-d 23:59:59');
                $usuario->premium_at = $f;
            }

            $usuario->save();

            return redirect()->back()->with('mensaje', '¡Se han agregado '.$suscripcion->duracion.' días de acceso premium a tu cuenta!');
        }else{

        }

    }
}
