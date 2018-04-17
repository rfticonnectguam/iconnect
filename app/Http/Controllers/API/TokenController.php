<?php

namespace App\Http\Controllers\API;



use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;

use App\Token;

class TokenController extends Controller
{
    //

    public function generateToken(){
    	
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

    public function checkToken(Request $request){
    	
    	try {
            
            $query = Token::where('token', $request->token)->get();

            if(count($query) > 0){
                 return [
	                'status' => 'SUCCESS',
	                'message' => 'Valid Token', 
	            ];

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
}
