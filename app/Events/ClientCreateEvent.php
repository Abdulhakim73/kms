<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ClientCreateEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     */

    public int $room;

    public function __construct(public $data, $room, public $creator)
    {
        $this->room = $room['id'];
    }

    public function broadcastAs(): string
    {
        return 'create-client-user: ' . $this->room;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new Channel('server-channel')
        ];
    }

    public function broadcastWith(): array
    {
        return [
            'creator' => $this->creator,
            'data' => $this->data
        ];
    }
}
