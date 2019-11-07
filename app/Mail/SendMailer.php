<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMailer extends Mailable
{
    use Queueable, SerializesModels;

    public $nombre;
    public $username;
    public $password;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($nombre,$username,$password)
    {
        $this->nombre = $nombre;
        $this->username = $username;
        $this->password = $password;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Recuperar Contraseña')->view('emails.contact');
    }
}
