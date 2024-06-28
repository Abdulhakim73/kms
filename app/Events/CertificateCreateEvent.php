<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class CertificateCreateEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public string $certificate;

    /**
     * Create a new event instance.
     */
    public function __construct($certificate)
    {
        $this->certificate = $certificate;
    }

    public function broadcastAs(): string
    {
        return 'create-certificate';
    }


    /**
     * @return Channel[]
     */
    public function broadcastOn(): array
    {
        return [
            new Channel('server-channel'),
        ];
    }

    public function broadcastWith(): array
    {
        return [
            'certificate' => $this->certificate
        ];
    }
}
