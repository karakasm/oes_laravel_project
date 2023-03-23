<?php

namespace App\Mail;

use App\Models\Announcement;
use App\Models\Course;
use App\Models\User;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AnnouncementShared extends Mailable
{
    use Queueable, SerializesModels;

    private User $sender;
    private Announcement $announcement;
    private Course $course;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $sender, Announcement $announcement, Course $course)
    {
        $this->sender = $sender;
        $this->announcement = $announcement;
        $this->course = $course;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            from: new Address($this->sender->email, $this->sender->name . " " . $this->sender->surname),
            subject: 'Announcement Shared',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            view: 'emails.announcement.shared',
            with: [
                'sender_fname' => $this->sender->name . " " . $this->sender->surname,
                'announcement' => $this->announcement,
                'course_name' => $this->course->name . " " . $this->course->number,
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
