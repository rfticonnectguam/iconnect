<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Prepaid_5; //added Prepaid_5 model
use App\Http\Resources\Prepaid_5 as Prepaid_5Resource; //added user Prepaid_5 Resource
use App\Http\Resources\AvailablePrepaid_5 as AvailablePrepaid_5Resource; //added user Prepaid_5 Resource


class Prepaid_5sController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function getAllPrepaid5(){

        //get all prepaid
        $prepaid_data = Prepaid_5::all();
        
        //call resource collection
        $payload = Prepaid_5Resource::collection($prepaid_data);      
          
          return [
                'status' => 'OK',
                'data' => $payload,
                'message' => 'Succesfully getting all data', 
            ];
    }

    public function getAllAvailablePrepaid5(){

        //get all available prepaid 5
        $prepaid_data = Prepaid_5::where('availability', 0)->get();

        if(count($prepaid_data) > 0){
            //available
            //call resource collection
            $payload = AvailablePrepaid_5Resource::collection($prepaid_data);   

             return [
                'status' => 'SUCCESS',
                'data' => $payload,
                'message' => 'Succesfully getting all available prepaid 5', 
            ];

        }else{
            // no available
           return [
                'status' => 'FAILED',
                'message' => 'No Available Prepaid 5', 
            ];
        }
       
    }

   
}
