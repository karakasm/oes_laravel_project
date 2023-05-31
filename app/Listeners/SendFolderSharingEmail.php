<?php

namespace App\Listeners;

use App\Events\FolderShared;
use App\Mail\FolderShared as MailFolderShared;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendFolderSharingEmail implements ShouldQueue
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
     * @param  object  $event
     * @return void
     */
    public function handle(FolderShared $event)
    {
        $sender = User::findOrFail($event->course->instructor_id);
        $users = $event->course->users()->get();
        foreach ($users as $user) {
            Mail::to($user->email)->send(new MailFolderShared($sender, $event->folder, $event->course));
        }
    }
}
