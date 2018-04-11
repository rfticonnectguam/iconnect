<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;//include validator
use Illuminate\Support\Facades\DB;
use Mapper;

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
        Mapper::map(13.503813, 144.803023, ['zoom' => 13,'center' => true, 'marker' => true]);
        Mapper::marker(13.519893, 144.817574);
        Mapper::marker(13.489788, 144.781911);
        Mapper::marker(13.471375, 144.755719);
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
