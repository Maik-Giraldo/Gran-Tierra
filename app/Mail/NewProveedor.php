<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewProveedor extends Mailable
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
         return $this->view('mails.newproveedor')->with([
           'name' =>$this->data['name'],
           'Tel' =>$this->data['Tel'],
           'email' =>$this->data['email'],
           'Ciudad' =>$this->data['Ciudad'],
           'Nit' =>$this->data['Nit'],
           'Empresa' =>$this->data['empresa'],
         ]
       );
     }
}
