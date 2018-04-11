<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

use Illuminate\Http\Request;

class ContactEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(Request $request)
    {   
        $msg = $request->Message;
        $name = $request->Name;
       //$name = ucfirst($request->First_name)." ".ucfirst($request->Last_name);
        return $this->view('mail.contactEmail',['name'=>$name,'msg'=>$msg])->to('reygie.tarroquin@gmail.com');
    }
}
