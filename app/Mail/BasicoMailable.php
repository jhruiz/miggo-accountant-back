<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;


class BasicoMailable extends Mailable
{
    use Queueable, SerializesModels;

    public $details;

    public function __construct($details)
    {
        $this->details= $details;
    }

    public function build()
    {
        // return $this->view('view.name');
        return $this->subject('texto del mailable')->view('emails.CorreoBasico');
    }
}
