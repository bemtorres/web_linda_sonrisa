<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EnviarProveedor extends Mailable
{
    use Queueable, SerializesModels;


    public $nombre;
    public $arreglo;
    public $codigo;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($nombre,$arreglo,$codigo)
    {
        $this->nombre = $nombre;
        $this->arreglo = $arreglo;
        $this->codigo = $codigo;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // return $this->view('emails.solicitud');
        return $this->subject('Solicitud de productos')->view('emails.solicitud');
    }
}
