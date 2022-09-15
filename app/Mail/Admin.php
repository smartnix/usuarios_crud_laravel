<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;

class Admin extends Mailable
{
    use Queueable, SerializesModels;

  

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $countries = DB::table('usuarios')
                            ->selectRaw('pais, COUNT(*) AS numero')
                            ->groupBy('pais')
                            ->get();
      
        return $this->view('email.admin')->with(['countries'=>$countries]);
    }
}
