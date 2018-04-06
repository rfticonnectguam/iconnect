<?php

namespace App\Http\Controllers\API;



use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;

class TokenController extends Controller
{
    //

    public function generateToken(){
    	
    	DB::table('tokens')->insert(
		    ['token' => str_random(25)]
		);

    	//TODO 

  		//try {
		// 	 $data = DB::table('tokens')->insert(
		// 	    ['token' => str_random(25)]
		// 	);
		// }
		// catch (\Exception $e) {
		//     return $e->getMessage();
		// }


		return $data;

    }

    public function checkToken(){

    	///
    }
}
