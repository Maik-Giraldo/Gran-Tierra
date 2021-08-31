<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Soporte extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($request)
    {
        $this->data = $request;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
     public function build()
     {
         return $this->view('mails.newsoport')->with([
           'name' =>$this->data['name'],
           'email' =>$this->data['email'],
           'subject' =>$this->data['subject'],
           'body' =>$this->data['body'],
         ]
       );
     }
}
