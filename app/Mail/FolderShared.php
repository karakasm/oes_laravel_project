<?php

namespace App\Mail;

use App\Models\Course;
use App\Models\Folder;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class FolderShared extends Mailable
{
    use Queueable, SerializesModels;

    private User $sender;
    private Folder $folder;
    private Course $course;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $sender, Folder $folder, Course $course)
    {
        $this->sender = $sender;
        $this->folder = $folder;
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
            subject: 'Folder Shared',
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
            view: 'emails.folder.shared',
            with: [
                'sender_fname' => $this->sender->name . " " . $this->sender->surname,
                'folder' => $this->folder,
                'course_name' => $this->course->name . " " . $this->course->number,
                'url' => route('student.courses.folders.index', ['course' => $this->course]),
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
