<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReportUserNotification extends Mailable
{
    use Queueable, SerializesModels;
    public $adminNoti;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($adminNoti)
    {
        $this->adminNoti = $adminNoti;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Feedback de Denúncia')->view('email.adminReportReturn')->with('data',$this->adminNoti);
    }
}
