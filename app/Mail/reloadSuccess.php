<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class reloadSuccess extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->name = $data['name'];
        $this->email = $data['email'];
        $this->pin = $data['pin'];
        $this->serial = $data['serial'];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
       //$name = ucfirst($request->First_name)." ".ucfirst($request->Last_name);
        return $this->view('mail.reloadSuccess',['name'=>$this->name,'pin'=>$this->pin,'serial'=>$this->serial])->to($this->email);
    }
}
