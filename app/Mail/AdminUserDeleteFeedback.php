<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AdminUserDeleteFeedback extends Mailable
{
    use Queueable, SerializesModels;
    public $userAdmin;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($userAdmin)
    {
        $this->userAdmin = $userAdmin;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Relatório de Exclusão')
        ->view('email.accountRemoved')->with('data',$this->userAdmin);
    }
}
