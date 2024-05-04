<?php

namespace App\Mail;

use App\Models\Blog;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NoticeInstructorAboutStatusBlog extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public Blog $blog;
    public function __construct(Blog $blog)
    {
        $this->blog = $blog;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->blog->status === 'approved' ? 'Xin chúc mừng bài viết của bạn đã được duyệt' : 'Thông báo Bài viết của bạn đã bị tạm khóa'
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        if ($this->blog->status == 'approved') {
            return new Content(
                view: 'mail_template.email_notice_blog_approved',
                with: ['blog' => $this->blog],
            );
        } else {
            return new Content(
                view: 'mail_template.email_notice_blog_suspended',
                with: ['blog' => $this->blog],
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
