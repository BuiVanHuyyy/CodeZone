<?php

namespace App\Listeners;

use App\Events\SendMailNoticeToInstructorEvent;
use App\Mail\NoticeInstructorAboutStatusAccount;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendMailToNoticeInstructorStatusListener
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
    public function handle(SendMailNoticeToInstructorEvent $event): void
    {
        $instructor = $event->instructor;
        Mail::to($instructor->user->email)->send(new NoticeInstructorAboutStatusAccount($instructor));
    }
}
