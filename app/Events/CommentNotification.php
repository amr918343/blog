<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class CommentNotification implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    // properties
    public $creatorId;
    public $userName;
    public $postSlug;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        
        $this->creatorId = $data['creatorId'];
        $this->userName = $data['userName'];
        $this->postSlug = $data['postSlug'];
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('comment-notification.' . $this->creatorId);
    }
    public function broadcastAs() {
        return ['CommentNotification'];
    }
    public function broadcastWith()
    {
        return [
            'postSlug' => $this->postSlug,
            'userName' => $this->userName,
        ];
    }
}
