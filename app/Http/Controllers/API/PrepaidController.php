<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Prepaid_5; //added Prepaid_5 model
use App\Prepaid_10; //added Prepaid_10 model
use App\Lte_3_day; //added Lte_3_day model

use Illuminate\Support\Facades\Validator;//include validator 
use DateTime;

class PrepaidController extends Controller
{
    //

    public function getNumberOfAvailablePrepaid5(){

        $prepaid_data = Prepaid_5::where('availability', 1)->get();

        if(count($prepaid_data) > 0){

            return [
                'status' => 'SUCCESS',
                'data' => count($prepaid_data),
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

        $prepaid_data = Prepaid_10::where('availability', 0)->get();

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

        $prepaid_data = Lte_3_day::where('availability', 0)->get();

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

    public function getRandomSelectedCard(Request $request){

        //check if request id is exist
        $card = $request->Card_type;

        if(isset($card)){
            
            // get the selected card
            return $this->generateSelectedCard($card);

        }else{
            return $this->failed("Selected card not found!");

        }//end of if and else

    }


    public function generateSelectedCard($card){

        if($card == 'prepaid_5'){

            $prepaid_data = Prepaid_5::where('availability', 0)
                                        ->inRandomOrder()
                                        ->limit(1)
                                        ->get();
       if(count($prepaid_data) > 0){
                 return $this->success($prepaid_data,'Successfully getting random available prepaid 5 card');
        }else{
            //NO AVAILABLE CARD 
            //SEND EMAIL TO USER
            return $this->failed("No available prepaid 5 card, Please check your email");
        }

           

        }else if($card == 'prepaid_10'){

            $prepaid_data = Prepaid_10::where('availability', 0)
                                        ->inRandomOrder()
                                        ->limit(1)
                                        ->get();

            if(count($prepaid_data) > 0){
                 return $this->success($prepaid_data,'Successfully getting random available prepaid 10 card');
            }else{
                //NO AVAILABLE CARD 
                //SEND EMAIL TO USER
                return $this->failed("No available prepaid 10 card, Please check your email");
            }
                                        
            

        }else if($card == 'Lte_3_days'){

            //get random available card
            $prepaid_data = Lte_3_day::where('availability', 0)
                                        ->inRandomOrder()
                                        ->limit(1)
                                        ->get();

            if(count($prepaid_data) > 0){
                 return $this->success($prepaid_data,'Successfully getting random available lte 3 days card');
            }else{
                //NO AVAILABLE CARD 
                //SEND EMAIL TO USER
                return $this->failed("No available LTE card, Please check your email");
            }

        }else{
            return $this->failed("Card not found!");
        }//end of if and else
            
    }


    public function prepaidPayment(Request $request){

        $ErrorPayload = (object) [];
        $ErrorStatus = false;

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

            //check if email is valid 
            //RFC EMAIL REGEX
            $pattern = '/^(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){255,})(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){65,}@)(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22))(?:\\.(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-z0-9]+(?:-+[a-z0-9]+)*\\.){1,126}){1,}(?:(?:[a-z][a-z0-9]*)|(?:(?:xn--)[a-z0-9]+))(?:-+[a-z0-9]+)*)|(?:\\[(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|(?:(?!(?:.*[a-f0-9][:\\]]){7,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]:){5,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\\]))$/iD';

            if (!preg_match($pattern, $request->Email)) {
                // emailaddress is invalid
                 $ErrorPayload->Email = ["Invalid Email"];
                 $ErrorStatus = true;
            }
            
            //check if valid credit card number
            $validate =  $this->isValidCC($request->CCNumber);

            if(!$validate){
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

                            return $this->generateSelectedCard($request->Card_type);
                }else{

                    return [
                        'status' => 'FAILED',
                        'message' => 'Selected card not found',
                   ];
                }

            }else{

                //Invalid data
                return [
                    'status' => 'FAILED',
                    'data'=> $ErrorPayload,
                    'message' => 'Invalid data',
               ];
            }

            
        }else{
          return $validation;
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
            'Country' => 'required|string|min:5|max:25',
            'Expiry_date' => 'required|string|min:5|max:25',
            'Card_type' => 'required|string',
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


    public function isValidCC($cc_number) {
        // Strip any non-digits (useful for credit card numbers with spaces and hyphens)
        $cc_number = preg_replace('/\D/', '', $cc_number);
        // Set the string length and parity
        $number_length = strlen($cc_number);
        $parity = $number_length % 2;
        // Loop through each digit and do the maths
        $total = 0;
        for ($i = 0; $i < $number_length; $i++) {
            $digit = $cc_number[$i];
            // Multiply alternate digits by two
            if ($i % 2 == $parity) {
                $digit *= 2;
                // If the sum is two digits, add them together (in effect)
                if ($digit > 9) {
                    $digit -= 9;
                }
            }
            // Total up the digits
            $total += $digit;
        }
        // If the total mod 10 equals 0, the number is valid
        return ($total % 10 == 0) ? true : false;
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
