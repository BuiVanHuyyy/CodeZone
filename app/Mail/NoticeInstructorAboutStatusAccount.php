<?php

namespace App\Mail;

use App\Models\Instructor;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NoticeInstructorAboutStatusAccount extends Mailable
{
    use Queueable, SerializesModels;

    private Instructor $instructor;
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
        if ($this->instructor->user->status == 'active') {
            return new Envelope(
                subject: 'Chúc mừng bạn đã trở thành một giảng viên của CodeZone',
            );
        }else {
            return new Envelope(
                subject: 'Thông báo Khóa tài khoản Giảng viên trên CodeZone',
            );
        }
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        if ($this->instructor->user->status == 'active') {
            return new Content(
                view: 'mail_template.email_notice_instructor_approved',
                with: ['instructor' => $this->instructor],
            );
        } else {
            return new Content(
                view: 'mail_template.email_notice_instructor_suspended',
                with: ['instructor' => $this->instructor],
            );
        }
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
