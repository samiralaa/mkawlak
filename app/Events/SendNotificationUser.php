<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SendNotificationUser implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $data;

    /**
     * Create a new event instance.
     */
    public function __construct($offer)
    {
        $this->data  = [
            'post_name'    => $offer->post->name,
            'company_name' => $offer->company->name,
            'user_id'      => $offer->post->user->id,
        ];
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */

    public function broadcastOn()
    {
        return ['user-offer-' . $this->data['user_id']];
    }

    public function broadcastAs()
    {
        return 'offer';
    }
}
