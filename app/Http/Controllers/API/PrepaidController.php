<?php

namespace App\Http\Controllers\API;

use Exception;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;

use App\Prepaid_5; //added Prepaid_5 model
use App\Prepaid_10; //added Prepaid_10 model
use App\Lte_3_day; //added Lte_3_day model
use App\Token; //added Lte_3_day model
use App\PendingLoad; // pendingload model

use Illuminate\Support\Facades\Validator;//include validator 
use DateTime;

use Mail; //added mail function
use App\Mail\sendPaymentErrorEmail;//added payment error mail
use App\Mail\reloadSuccess;//added reload success mail

use App\Library\xcriptValidation;//added xcript custom validation library
use App\Library\Authnet\ICGAuthnet;//added xcript custom validation library

class PrepaidController extends Controller
{

    //authnet verification
    public function AuthnetValidation(){

        $Authnet = new ICGAuthnet();

        return $Authnet->AuthVerification();
    }

    public function getNumberOfAvailablePrepaid5(){


        try {
        
            $prepaid_data = Prepaid_5::where('availability', 0)->get();
            $payment->setTransaction($cc_number, $exp_date, $price, $cvv);

        } catch (Exception $e) {
            return [
                'status' => 'FAILED',
                'message' => $e, 
            ];
        }

        if(count($prepaid_data) > 0){

            return [
                'status' => 'SUCCESS',
                'dData' => count($prepaid_data),
                'message' => 'Has an available Prepaid 5', 
            ];

        }else{
            // no available
           return [
                'status' => 'FAILED',
                'message' => 'No Available Prepaid 5', 
            ];
        }

        
    }

    public function getNumberOfAvailablePrepaid10(){

       
        try {
            $prepaid_data = Prepaid_10::where('availability', 0)->get();
        } catch (Exception $e) {
            return [
                'status' => 'FAILED',
                'message' => $e, 
            ];
        }

        if(count($prepaid_data) > 0){

            return [
                'status' => 'SUCCESS',
                'data' => count($prepaid_data),
                'message' => 'Has an available Prepaid 10', 
            ];

        }else{
            // no available
           return [
                'status' => 'FAILED',
                'message' => 'No Available Prepaid 10', 
            ];
        }
    }

     public function getNumberOfAvailableLTE3days(){


        try {
           $prepaid_data = Lte_3_day::where('availability', 0)->get();
        } catch (Exception $e) {
            return [
                'status' => 'FAILED',
                'message' => $e, 
            ];
        }

        if(count($prepaid_data) > 0){

            return [
                'status' => 'SUCCESS',
                'data' => count($prepaid_data),
                'message' => 'Has an available LTE 3 days', 
            ];

        }else{
            // no available
           return [
                'status' => 'FAILED',
                'message' => 'No Available LTE 3 days', 
            ];
        }
    }

    // public function getRandomSelectedCard(Request $request){

    //     //check if request id is exist
    //     $card = $request->Card_type;

    //     if(isset($card)){
    //         // get the selected card
    //           return $this->generateSelectedCard($card);
    //     }else{
    //         return $this->failed("Selected card not found!");

    //     }//end of if and else

    // }


    public function generateSelectedCard($card,$email){

        if($card == 'prepaid_5'){

            try {
                $prepaid_data = Prepaid_5::where('availability', 0)
                                        ->inRandomOrder()
                                        ->limit(1)
                                        ->get();
                if(count($prepaid_data) > 0){
                        
                    //update availability after generating
                    try {
                       Prepaid_5::where('id', $prepaid_data[0]->id)
                                    ->update([
                                        'availability' => 1,
                                        'purchased_date' => new DateTime(),
                                        'email'=>$email
                                        ]); 

                        return $this->success($prepaid_data,'Successfully getting random available prepaid 5 card');
                                    
                    } catch (Exception $e) {
                        //todo insert to logs
                        return $this->failed("Unable to update availability");
                    }

                        
                }else{
                    //NO AVAILABLE CARD 
                    //SEND EMAIL TO USER
                    return $this->failed("No available prepaid 5 card, Please check your email");
                }

            } catch (Exception $e) {
                return [
                    'status' => 'ERROR',
                    'message' => $e, 
                ];
            }

        }else if($card == 'prepaid_10'){

            try {
                $prepaid_data = Prepaid_10::where('availability', 0)
                                    ->inRandomOrder()
                                    ->limit(1)
                                    ->get();

                if(count($prepaid_data) > 0){

                    //update availability after generating
                    try {
                       Prepaid_10::where('id', $prepaid_data[0]->id)
                                    ->update([
                                        'availability' => 1,
                                        'purchased_date' => new DateTime(),
                                        'email'=>$email
                                        ]); 
                                     
                        return $this->success($prepaid_data,'Successfully getting random available prepaid 10 card');
                                    
                    } catch (Exception $e) {
                        //todo insert to logs
                        return $this->failed("Unable to update availability");
                    }


                    
                }else{
                    //NO AVAILABLE CARD 
                    //SEND EMAIL TO USER
                    return $this->failed("No available prepaid 10 card, Please check your email");
                }
                    
            } catch (Exception $e) {
                return [
                    'status' => 'ERROR',
                    'message' => $e, 
                ];
            }

        }else if($card == 'Lte_3_days'){

             try {
                //get random available card
                $prepaid_data = Lte_3_day::where('availability', 0)
                                            ->inRandomOrder()
                                            ->limit(1)
                                            ->get();

                if(count($prepaid_data) > 0){

                    //update availability after generating
                    try {

                       Lte_3_day::where('id', $prepaid_data[0]->id)
                                    ->update([
                                        'availability' => 1,
                                        'purchased_date' => new DateTime(),
                                        'email'=>$email
                                        ]); 
                                     
                       return $this->success($prepaid_data,'Successfully getting random available lte 3 days card');
                                    
                    } catch (Exception $e) {
                        //todo insert to logs
                        return $this->failed("Unable to update availability");
                    }

                     
                }else{
                    //NO AVAILABLE CARD 
                    //SEND EMAIL TO USER
                    return $this->failed("No available LTE card, Please check your email");
                }

            } catch (Exception $e) {
                return [
                    'status' => 'ERROR',
                    'message' => $e, 
                ];
            }

        }else{
            return $this->failed("Card not found!");
        }//end of if and else
            
    }


    public function prepaidPayment(Request $request){

        $ErrorPayload = (object) [];
        $ErrorStatus = false;

        $xcript = new xcriptValidation;//include xcriptValidation

        //return 'show ok';
        $validation = $this->validatePrepaidPayment($request->all());

        //run the validation
        if($validation['status'] == 'SUCCESS'){

            //check if valid card or prepaid card 
            if($request->Card_type != 'prepaid_5' && 
                    $request->Card_type != 'prepaid_10' && 
                        $request->Card_type != 'Lte_3_days'){

                $ErrorPayload->Card_type = ["Invalid Card type"];
                $ErrorStatus = true;
            }

            if(!$xcript->validateEmail($request->Email)){
                $ErrorPayload->Email = ["Invalid Email"];
                $ErrorStatus = true;
            }
           
            
            //check if valid credit card number
            if(!$xcript->validateCC($request->CCNumber)){
                $ErrorPayload->CCNumber = ['Invalid Credit card number'];
                $ErrorStatus = true;
            }
            
            if(!$ErrorStatus){

                //valid data
                //CALL AND SEND DATA TO PAYMENT API
                
                //Get random active card on selected card.
                if( $request->Card_type == 'prepaid_5' || 
                        $request->Card_type == 'prepaid_10' || 
                            $request->Card_type == 'Lte_3_days'){

                            //create token
                            //get available selected card and store it on cookie
                            
                            //check if has available card on not 
                            $available_card = $this->generateSelectedCard($request->Card_type,$request->Email);

                            if($available_card['status'] == "SUCCESS"){

                                //send card detail on email
                                $data = [
                                    'email' => $request->Email,
                                    'name' => ucfirst($request->First_name).' '.ucfirst($request->Last_name),
                                    'pin' => $available_card['data'][0]['pin'],
                                    'serial' => $available_card['data'][0]['serial_number'],
                                ];


                                try {
                                     Mail::send(new reloadSuccess($data));
                                     $payload =  $available_card;
                                } catch (Exception $e) {
                                    $payload = [
                                        'status' => 'FAILED',
                                        'message' => $e, 
                                    ];
                                }

                            }else if($available_card['status'] == "FAILED"){
                                
                                try {
                                    
                                    //insert data on pending_load table
                                     $PendingLoad = DB::table('pending_loads')->insert([
                                        'product' => $request->Card_type,
                                        'status' => 1,
                                        'first_name' => $request->First_name,
                                        'last_name' => $request->Last_name,
                                        'email' => $request->Email,
                                        'created_at' => new DateTime()
                                    ]);

                                     //send email to the registered email 
                                 
                                    try {

                                        Mail::send(new sendPaymentErrorEmail());
                                        
                                        try {
                                            $PendingLoad;
                                            $array_data = [];
                                           
                                            $payload = [
                                                'status' => 'SUCCESS',
                                                'data' => $array_data,
                                                'message' => 'Email has been sent to your email',
                                            ];
                                        } catch (Exception $e) {
                                            $payload = [
                                                'status' => 'FAILED',
                                                'message' => $e, 
                                            ];
                                        }
   
                                    } catch (Exception $e) {
                                        $payload = [
                                            'status' => 'FAILED',
                                            'message' => $e, 
                                        ];
                                    }

                                } catch (Exception $e) {
                                    $payload = [
                                        'status' => 'ERROR',
                                        'message' => $e,
                                    ];
                                }
                              
                            }
                            
                    
                }else{

                    $payload = [
                        'status' => 'FAILED',
                        'message' => 'Selected card not found',
                   ];
                }

            }else{

                //Invalid data
                $payload = [
                    'status' => 'FAILED',
                    'data'=> $ErrorPayload,
                    'message' => 'Invalid data',
               ];
            }

            
        }else{
                
             $payload = [
                    'status' => 'FAILED',
                    'data'=> $validation,
                    'message' => 'Failed on validation',
               ];
        }

        //check payload status
        if($payload['status'] == "SUCCESS"){
            //redirect to success page
            return view('reload/successReload')->with($payload);
        }else{
            return view('reload/reloadPayment')->with($payload);   
        }
        

    }

    public function validatePrepaidPayment($data){


        $validation =  Validator::make($data, [
            'Email' => 'required|email',
            'First_name' => 'required|string|min:2|max:25',
            'Last_name' => 'required|string|min:2|max:25',
            'CCNumber' => 'required|integer|min:5',
            'CVV' => 'required|string|min:5',
            'Address' => 'required|string|min:5|max:250',
            'City' => 'required|string|min:5|max:25',
            'ZipCode' => 'required|integer|digits_between:4,4',
            'Country' => 'required|string|min:1|max:25',
            'Expiry_date' => 'required|string|min:5|max:25',
            'Card_type' => 'required|string',
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

    public function getAvailableCard(){

        $card = [
            'prepaid_5' => 0,
            'prepaid_10' => 0,
            'Lte_3_days' => 0,
        ];

        $prepaid_5 = $this->getNumberOfAvailablePrepaid5();
        $prepaid_10 = $this->getNumberOfAvailablePrepaid10();
        $Lte_3_day = $this->getNumberOfAvailableLTE3days();
        
        if($prepaid_5['status'] == "SUCCESS"){
            $card['prepaid_5'] = 1;
        }

        if($prepaid_10['status'] == "SUCCESS"){
            $card['prepaid_10'] = 1;
        }

        if($Lte_3_day['status'] == "SUCCESS"){
            $card['Lte_3_days'] = 1;
        }

        return [
                'status' => 'SUCCESS',
                'data' => $card,
                'message' => 'Successfully getting available card promo', 
            ];

    }

    public function generateToken (){

        $token = str_random(25);    
        
        try{
            
            //check if token is already exist.
            $query = Token::where('token', $token)->get();

            if(count($query) == 0){

                try {
                    //save token
                    DB::table('tokens')->insert(
                        ['token' => $token]
                    );

                    return [
                        'status' => 'SUCCESS',
                        'data' => $token, 
                        'message' => 'Successfully generating token'
                    ];

                } catch (Exception $e) {
                    return [
                        'status' => 'FAILED',
                        'message' => $e, 
                    ];
                }

            }else{
                return [
                    'status' => 'FAILED',
                    'message' => 'Invalid Token', 
                ];
            }

        } catch (Exception $e) {
            return [
                'status' => 'FAILED',
                'message' => $e, 
            ];
        }

    }


    public function showImage(Request $request,$pin,$serial){

        $serial = $serial;
        $pin = $pin;

        $image = 'back-lte.png';
        $x_s = 343; $y_s = 83;
        $x_p = 120; $y_p = 60;
        
        $im = ImageCreateFromPNG('images/reload/'.$image);
        $black = ImageColorAllocate($im, 0, 0, 0);
        $font = 'Digit.TTF';
        imagettftext($im, 17, 0, $x_s, $y_s, $black, $font, $serial);
        imagettftext($im, 17, 0, $x_p, $y_p, $black, $font, $pin);
        $background = imagecolorallocate($im, 255, 255, 255);
        imagecolortransparent($im, $background);
        imagealphablending($im, false);
        imagesavealpha($im, true);
        header('Content-Type: image/png');
        ImagePNG($im);
        ImageDestroy($im);
    }

    public function success($data,$message){

        return [
            'status' => 'SUCCESS',
            'data' => $data,
            'message' => $message, 
        ];
    }

    public function failed($message){
        
        return [
            'status' => 'FAILED',
            'message' => $message, 
        ];
    }

}
