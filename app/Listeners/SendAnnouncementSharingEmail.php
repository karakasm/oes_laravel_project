<?php

namespace App\Listeners;

use App\Events\AnnouncementShared;
use App\Mail\AnnouncementShared as MailAnnouncementShared;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use PhpParser\ErrorHandler\Collecting;

class SendAnnouncementSharingEmail implements ShouldQueue
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

        $sender = User::findOrFail($event->course->instructor_id);
        $event->course->users()->chunkById(5, function (Collection $users) use ($event, $sender) {
            foreach ($users as $user) {
                Mail::to($user->email)->queue(new MailAnnouncementShared($sender, $event->announcement, $event->course));
            }
        });
        /*  $users = $event->course->users()->get();
        foreach ($users as $user) {
            Mail::to($user->email)->send(new MailAnnouncementShared($sender, $event->announcement, $event->course));
        } */
    }
}
