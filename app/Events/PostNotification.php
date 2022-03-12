<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class PostNotification implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    // properties
    public $userId;
    public $postSlug;
    public $postCreatedAt;
    public $userName;
    /**
     * Create a new event instance.
     *
     * @return void
     */

    public function __construct($data)
    {
        $this->dontBroadcastToCurrentUser();
        $this->userName = $data['userName'];
        $this->postSlug = $data['postSlug'];
        $this->postCreatedAt = $data['postCreatedAt'];
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('post-notification');
    }
    public function broadcastAs()
    {
        return 'PostNotification';
    }

    public function broadcastWith()
    {
        return [
            'userId' => $this->userId,
            'userName' => $this->userName,
            'postSlug' => $this->postSlug,
            'postCreatedAt' => $this->postCreatedAt,
        ];
    }
}
