<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
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
        return view('home');
    }

    public function myMobileAccount(){
        return view('mymobile');   
    }

     public function myLTEAccount(){
        return view('mylte');   
    }

    public function buyiPhoneX(){
       return view('value_mobile.buyiphonex');   
    }
    
    public function showiPhoneX(){
       return view('value_mobile.showiphonex');   
    }

    public function showLTEtrue4G(){
        return view('mifi.lte_true_4g');
    }

    public function reload(){
        return view('reload.reload');
    }

    public function reloadpayment(){
        return view('reload.reloadPayment');
    }

    public function successpayment(){
        return view('reload.successReload');
    }

    public function test(){

         return view('test');
    }

    public function sendData(Request $request){
       
        $payload['username'] = $request->username;
        $payload['password'] = $request->password;

        $data = [
            'status'=>'SUCCESS',
            'data'=>$payload,
            'message'=>'Successfully getting data',
            ];
        return view('test')->with($data);
    }

    public function fileupload(Request $request){

	   $request->validate([
            'fileToUpload' => 'required|file|max:1024',
        ]);
        
        $fileName = "avatar".time().'.'.request()->fileToUpload->getClientOriginalExtension();
        
        $request->fileToUpload->storeAs('logos',$fileName);
        
        //todo save to database

        return $fileName;

    }
    
}
