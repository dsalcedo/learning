<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Logout;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;
use Carbon\Carbon;

class LogoutListenerEvent
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
     * @param  Logout  $event
     * @return void
     */
    public function handle(Logout $event)
    {
        $u  = $event->user;

        if(!is_null($u->premium_at)){
            if( Carbon::now()->gt(Carbon::parse($u->premium_at)) ){
                $u->premium_at = null;
                $u->premium = false;
            }
        }

        $u->locked = false;
        $u->logged_out_at = Carbon::now();
        $u->save();
    }
}
