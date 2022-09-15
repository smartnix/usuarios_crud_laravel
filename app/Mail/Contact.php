<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;


// Mailers
class Contact extends Mailable
{
    use Queueable, SerializesModels;

    public $nombre;
    public $apellido;
    public $email;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($nombre,$apellido, $email)
    {
        $this->nombre = $nombre;
        $this->nombre = $apellido;
        $this->email = $email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.registro');
        
    }
}
