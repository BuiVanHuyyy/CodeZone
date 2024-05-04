<?php

namespace App\Listeners;

use App\Events\SendMailNotiveBlogEvent;
use App\Mail\NoticeInstructorAboutStatusBlog;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendMailToNoticeBlogStatusListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(SendMailNotiveBlogEvent $event): void
    {
        $blog = $event->blog;
        Mail::to($blog->author->email)->send(new NoticeInstructorAboutStatusBlog($blog));
    }
}
