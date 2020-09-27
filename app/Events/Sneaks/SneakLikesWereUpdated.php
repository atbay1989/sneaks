<?php

namespace App\Events\Sneaks;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

use App\Models\Sneak;
use App\Models\User;


class SneakLikesWereUpdated implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Undocumented variable
     *
     * @var [type]
     */
    protected $sneak;

    /**
     * Undocumented variable
     *
     * @var [type]
     */
    protected $user;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(User $user, Sneak $sneak)
    {
        $this->user = $user;
        $this->sneak = $sneak;
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function broadcastWith()
    {
        return [
            'id' => $this->sneak->id,
            'user_id' => $this->user->id,
            'count' => $this->sneak->likes->count(),
        ];
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function broadcastAs()
    {
        return 'SneakLikesWereUpdated';
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('sneaks');
    }
}
