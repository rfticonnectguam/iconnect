<?php

// Author:Reygie Florida Tarroquin
// Date : 04|11|18
// This is class for Authnet service

namespace App\Library\Authnet;
use App\Library\Authnet\AuthnetAIM;//added xcript custom validation library


class ICGAuthnet
{

    public function AuthVerification(){
        
        //sandbox
        $AuthnetID = '73zJaJ96NUBW';
        $AuthnetKey = '2HmJ6Qq346Jq3E5b'; 
        $isSandbox = true;

        //live
        // $AuthnetID = '3zUCXf87m';
        // $AuthnetKey = '86tkXx9U927vW5mw'; 
        // $isSandbox = false;

        $cc_number = '370000000000002';
        $exp_date = '12/02';
        $price = '20';
        $cvv =  '123';

        try {
            
            $payment = new AuthnetAIM($AuthnetID,$AuthnetKey,$isSandbox);
            $payment->setTransaction($cc_number, $exp_date, $price, $cvv);

            // OPTIONAL PARAMETERS
            // $payment->setParameter("x_first_name", $fname);
            // $payment->setParameter("x_last_name", $lname);
            // $payment->setParameter("x_address", $address);
            // $payment->setParameter("x_city", $city);
            // $payment->setParameter("x_state", $state);
            // $payment->setParameter("x_zip", $zipcode);
            // $payment->setParameter("x_country", $country);
            // $payment->setParameter("x_email", $email);
            // $payment->setParameter("x_email_customer", false);
            // $payment->setParameter("x_description", $description);

             $payment->process();

             // return $payment;

             // return [
             //    'result' => $payment
             // ];

             if ($payment->isApproved()) {
                return 'ok';
             }else if($payment->isDeclined()){
                return 'declined';
             }else if($payment->isError()){
                return 'error';
             }else{
                return 'no response';
             }

        } catch (Exception $e) {
          return $e;
        }
    }

}
