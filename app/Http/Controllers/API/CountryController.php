<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Country;

class CountryController extends Controller
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAllCountries()
    {
        //
        try{

            $prepaid_data = Country::orderBy('name', 'asc')->get();

            $payload = [
                'status' => 'SUCCESS',
                'data' => $prepaid_data,
                'message' => 'Successfully getting list of countries' 
            ];

        } catch (Exception $e) {
            $payload = [
                'status' => 'ERROR',
                'message' => $e, 
            ];
        }

        return $payload;
    }

}
