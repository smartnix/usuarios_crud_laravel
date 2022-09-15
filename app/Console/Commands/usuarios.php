<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

//Metodo schedule:work

class usuarios extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tarea:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'tarea diaria';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $usuarios = $this->GetUsersCount();
        $hoy = date("Y-m-d H:i:s"). "Tarea en ejecucion...(Usuarios registrador: ".$usuarios[0]->numero.")";
        Storage::append("log.txt", $hoy);
    }

    public function GetUsersCount()
    {
        $usuarios = DB::table('usuarios')
        ->selectRaw('COUNT(*) AS numero')
        ->get();

        return $usuarios;
    }
}
