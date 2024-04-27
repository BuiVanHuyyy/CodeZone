<?php

namespace App\Mail;

use App\Models\Course;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NoticeInstructorAboutStatusCourse extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public Course $course;
    public function __construct(Course $course)
    {
        $this->course = $course;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        if ($this->course->status == 'active') {
            return new Envelope(
                subject: 'Chúc mừng khóa học của bạn đã được duyệt',
            );
        } else {
            return new Envelope(
                subject: 'Thông báo Khóa học của bạn đã bị tạm khóa',
            );
        }
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        if ($this->course->status == 'approved') {
            return new Content(
                view: 'mail_template.email_notice_instructor_course_approved',
                with: ['course' => $this->course],
            );
        } else {
            return new Content(
                view: 'mail_template.email_notice_instructor_course_suspended',
                with: ['course' => $this->course],
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
