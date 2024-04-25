<?php

namespace App\Mail;

use App\Models\Instructor;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NoticeInstructorHasApproved extends Mailable
{
    use Queueable, SerializesModels;

    private $instructor;
    /**
     * Create a new message instance.
     */
    public function __construct(Instructor $instructor)
    {
        $this->instructor = $instructor;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Chúc mừng bạn đã trở thành một giảng viên của CodeZone',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mail_template.email_notice_instructor_approved',
            with: ['instructor' => $this->instructor],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
