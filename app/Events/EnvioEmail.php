<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;


// Events Email
class EnvioEmail
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $nombre;
    public $apellido;
    public $email;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($nombre,$apellido,$email)
    {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->email = $email;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
