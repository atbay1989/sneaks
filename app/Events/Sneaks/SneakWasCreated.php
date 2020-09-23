<?php

namespace App\Events\Sneaks;

use App\Http\Resources\SneakResource;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

use App\Models\Sneak;

class SneakWasCreated implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Undocumented variable
     *
     * @var [type]
     */
    protected $sneak;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Sneak $sneak)
    {
        $this->sneak = $sneak;
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function broadcastWith()
    {
        return (new SneakResource($this->sneak))->jsonSerialize();
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function broadcastAs()
    {
        return 'SneakWasCreated';
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return $this->sneak->user->followers->map(function ($user) {
            return new PrivateChannel('timeline.' . $user->id);
        })
        ->toArray();
    }
}
