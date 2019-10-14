<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Credentials extends Mailable
{
    use Queueable, SerializesModels;
    public $email;
    public $password;
    public $name;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name,$password,$email)
    {
        $this->name=$name;
        $this->password=$password;
        $this->email=$email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.credentials')->from('barid.bank2019@gmail.com','Directeur de banque barid')
            ->subject('Votre login et mot de passe');
    }
}
