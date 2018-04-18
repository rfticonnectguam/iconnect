<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;//include validator
use Illuminate\Support\Facades\DB;
use Mapper;

use Mail; //added mail function
use App\Mail\ContactEmail;//added contact email

use Exception;
use DateTime;

class ContactController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $this->showMapper();
        return view('contacts');
    }

    public function showMapper(){
        Mapper::map(13.503813, 144.803023, ['zoom' => 13,'center' => true, 'marker' => true]);
        Mapper::marker(13.519893, 144.817574);
        Mapper::marker(13.489788, 144.781911);
        Mapper::marker(13.471375, 144.755719);
    }

    public function saveMessage(Request $request){

        //validate data
        $validation = $this->validateMessage($request->all());

        if($validation['status'] == 'SUCCESS'){

            //store in database
            try {

                DB::table('contact_messages')->insert([
                    'Name' => $request->Name,
                    'Email' => $request->Email,
                    'Message' => $request->Message,
                    'created_at' => new DateTime(),
                ]);

                try {

                    //send email to admin
                    Mail::send(new ContactEmail());

                    $payload = [
                        'status' => 'SUCCESS',
                        'message' => 'Message has been sent', 
                     ];

                } catch (Exception $e) {

                    $payload = [
                        'status' => 'ERROR',
                        'message' => $e, 
                      ];
                }

            } catch (Exception $e) {

                 $payload = [
                    'status' => 'ERROR',
                    'message' => $e, 
                  ];
            }


            $payload = [
                'status'=>'SUCCESS',
                'message'=>'Message has been sent',
              ];

        }else{
            //return $validation;

            $payload = [
                'status'=>'FAILED',
                'data' => $validation,
                'message'=>'Failed on validation',
              ];
        }

        $this->showMapper();
        return view('contacts')->with($payload);

    }

    public function validateMessage($data){

        //todo regex validation for message
        $validation =  Validator::make($data, [
            'Name' => 'required|string|min:3|max:25',
            'Email' => 'required|email',
            'Message' => 'required|string|min:5|max:255',
            'g-recaptcha-response' => 'required|recaptcha',
        ]);

        if ($validation->fails()) {
            return [
                'status' => 'FAILED',
                'data' => $validation->messages(),
                'message' => 'Failed on validation', 
            ];
        }

        return [
            'status' => 'SUCCESS',
            'message' => 'Successfully validated', 
        ];
       
    }

    public function getAllContactMsg(){

        try {
            $StoreProc = DB::select("CALL getAllMsg()");

            $payload = [
                'status' => "SUCCESS",
                'data' => $StoreProc,
                'message' => 'Successfully getting all contact message',
            ];

        } catch (Exception $e) {
            $payload = [
                'status' => "ERROR",
                'data' => $e,
            ];
        }
        
        return $payload;
    }

    public function getMsgById(Request $request){

        try {
            $StoreProc = DB::select('CALL getMsgById(?)', array($request->id));

            $payload = [
                'status' => "SUCCESS",
                'data' => $StoreProc,
                'message' => 'Successfully contact message by ID',
            ];

        } catch (Exception $e) {
            $payload = [
                'status' => "ERROR",
                'data' => $e,
            ];
        }

        return $payload;

    }

}
