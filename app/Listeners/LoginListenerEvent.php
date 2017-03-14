<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;
use Carbon\Carbon;

class LoginListenerEvent
{
    protected $req;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->req = $request;
    }

    /**
     * Handle the event.
     *
     * @param  Login  $event
     * @return void
     */
    public function handle(Login $event)
    {
        $u  = $event->user;
        $ip = $this->req->getClientIp();

        if(is_null($u->ip)){
            $u->ip = $this->req->getClientIp();
        }else{
            if($u->ip != $ip){
                $u->locked = true;
            }
        }

        if(!is_null($u->premium_at)){
            if( Carbon::now()->gt(Carbon::parse($u->premium_at)) ){
                $u->premium_at = null;
                $u->premium = false;
            }
        }

        $u->logged_in_at = Carbon::now();
        $u->save();
    }
}
