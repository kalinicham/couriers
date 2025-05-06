<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class CourierLocationUpdated implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public float $lat;
    public float $lng;
    public int $courierId;

    /**
     * Create a new event instance.
     */
    public function __construct(int $id, float $lat, float $lng)
    {
        $this->courierId = $id;
        $this->lat = $lat;
        $this->lng = $lng;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new Channel('courier'),
        ];
    }

    public function broadcastWith(): array
    {
        return [
            'id' => $this->courierId,
            'lat' => $this->lat,
            'lng' => $this->lng,
        ];
    }
}
