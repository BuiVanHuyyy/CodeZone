<?php

namespace App\Listeners;

use App\Events\SendMailNoticeCourseEvent;
use App\Mail\NoticeInstructorAboutStatusCourse;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendMailToNoticeCourseStatusListener
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
    public function handle(SendMailNoticeCourseEvent $event): void
    {
        $course = $event->course;
        Mail::to($course->author->user->email)->send(new NoticeInstructorAboutStatusCourse($course));
    }
}
