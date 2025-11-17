<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class WelcomeMail extends Mailable
{
    use Queueable, SerializesModels;

    public $beneficiaryName;

    /**
     * Create a new message instance.
     */
    public function __construct($beneficiaryName)
    {
        $this->beneficiaryName = $beneficiaryName;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->view('emails.welcome')
                    ->subject('Welcome to FarmTech MIS');
    }
} 