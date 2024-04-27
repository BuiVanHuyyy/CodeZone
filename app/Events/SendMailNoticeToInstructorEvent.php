<?php

namespace App\Events;

use App\Models\Instructor;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SendMailNoticeToInstructorEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     *
     * Create a new event instance.
     */
    public Instructor $instructor;
    public function __construct(Instructor $instructor)
    {
        $this->instructor = $instructor;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('channel-name'),
        ];
    }
}
