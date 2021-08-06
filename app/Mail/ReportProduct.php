<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReportProduct extends Mailable
{
    use Queueable, SerializesModels;
    public $userMail;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($userMail)
    {
        $this->userMail = $userMail;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Produto Reportado')->view('email.userMailReport')->with('data',$this->userMail);
    }
}
