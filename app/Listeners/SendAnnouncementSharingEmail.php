<?php

namespace App\Listeners;

use App\Events\AnnouncementShared;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class SendAnnouncementSharingEmail
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\AnnouncementShared  $event
     * @return void
     */
    public function handle(AnnouncementShared $event)
    {
        Log::alert("message");
    }
}
