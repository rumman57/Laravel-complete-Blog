<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendComposeMail extends Mailable
{
    use Queueable, SerializesModels;
    public $to;
    public $messagefds;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->to      = $data;
       // $this->messagefds = $messagesf;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('rumman142228@gmail.com')
                    ->view('myadmin.composemsglayout');
    }
}
