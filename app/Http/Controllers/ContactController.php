<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;//include validator
use Illuminate\Support\Facades\DB;

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
        return view('contacts');
    }


    public function saveMessage(Request $request){
        //return $request->all();
        
        //validate data

        $validation = $this->validateMessage($request->all());

        if($validation['status'] == 'SUCCESS'){

            //store in database
            try {
                //save message
                DB::table('contact_messages')->insert([
                        'Name' => $request->Name,
                        'Email' => $request->Email,
                        'Message' => $request->Message
                    ]);

                return [
                    'status' => 'SUCCESS',
                    'message' => 'Message has been sent', 
                ];


            } catch (Exception $e) {
                return [
                    'status' => 'ERROR',
                    'message' => $e, 
                ];  
            }


            return [
                'status' => 'SUCCESS',
                'message' => 'Message has been sent', 
            ]; 

        }else{
            return $validation;
        }

    }

    public function validateMessage($data){

        //todo regex validation for message
        $validation =  Validator::make($data, [
            'Name' => 'required|string|min:3|max:25',
            'Email' => 'required|email|unique:contact_messages',
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

}
