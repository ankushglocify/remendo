<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BirtdayMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($value)
    {
        $this->user = $value;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {  

        $user = $this->user;
        //dd($user);
        return $this->from('naveen@glocify.com')
              ->view('email.birthday',compact('user'));
    }
}
