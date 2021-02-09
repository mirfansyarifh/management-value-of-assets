<?php


namespace App\Listeners;


use OwenIt\Auditing\Events\Auditing;

class AuditingListener
{
    /**
     * Create the Auditing event listener.
     */
    public function __construct()
    {
        // ...
    }

    /**
     * Handle the Auditing event.
     *
     * @param \OwenIt\Auditing\Events\Auditing $event
     * @return void
     */
    public function handle(Auditing $event)
    {
        // dd($event);
    }
}