<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// get all prepaid 5
Route::get('getAllPrepaid5','API\Prepaid_5sController@getAllPrepaid5');

// get all available prepaid 5
Route::get('getAllAvailablePrepaid5','API\Prepaid_5sController@getAllAvailablePrepaid5');


// get number of available prepaid 5
Route::get('getNumberOfAvailablePrepaid5','API\PrepaidController@getNumberOfAvailablePrepaid5');

// get number of available prepaid 10
Route::get('getNumberOfAvailablePrepaid10','API\PrepaidController@getNumberOfAvailablePrepaid10');

// get number of available lte 3 days
Route::get('getNumberOfAvailableLTE3days','API\PrepaidController@getNumberOfAvailableLTE3days');

// get random card or item on a selected prepaid;
Route::post('getRandomSelectedCard','API\PrepaidController@getRandomSelectedCard');

// get available card
Route::get('getAvailableCard','API\PrepaidController@getAvailableCard');



// this API is for generating token
Route::get('generateToken','API\TokenController@generateToken');

// this API is for checking token
Route::post('generateToken','API\TokenController@checkToken');

// this API is for successpayment 
Route::get('/successpayment/{pin}/{serial}', 'API\PrepaidController@showImage')->name('showImage');

//test route for stored procedure
Route::post('/getmsg', 'ContactController@getMsgById');

//This API is for getting list of countries
Route::get('/getAllCountries', 'API\CountryController@getAllCountries')->name('getAllCountries');



