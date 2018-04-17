<?php

// Author:Reygie Florida Tarroquin
// Date : 04|11|18
// This is a custom validation class in Laravel using PHP

namespace App\Library;

class xcriptValidation
{

   //This function is for validate email address using RFC 5322
   public function validateEmail($email){
        
        //RFC 5322 EMAIL REGEX
        $pattern = '/^(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){255,})(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){65,}@)(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22))(?:\\.(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-z0-9]+(?:-+[a-z0-9]+)*\\.){1,126}){1,}(?:(?:[a-z][a-z0-9]*)|(?:(?:xn--)[a-z0-9]+))(?:-+[a-z0-9]+)*)|(?:\\[(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|(?:(?!(?:.*[a-f0-9][:\\]]){7,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]:){5,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\\]))$/iD';

        if (!preg_match($pattern, $email)) {
            // emailaddress is invalid
            return false;
        }
        return true;
   }


   //This function is for validating credit card number using Luhn algorithm
   public function validateCC($cc_number) {
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

}
