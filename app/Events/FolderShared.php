<?php

namespace App\Events;

use App\Models\Course;
use App\Models\Folder;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class FolderShared
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public Folder $folder;
    public Course $course;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Folder $folder, Course $course)
    {
        $this->folder = $folder;
        $this->course = $course;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
