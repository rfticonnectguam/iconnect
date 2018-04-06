<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//route for events page
Route::get('/events', 'EventController@index')->name('event');

//route for contacts page
Route::get('/contacts', 'ContactController@index')->name('contact');

//route for mymobile login page
Route::get('/mymobile', 'HomeController@myMobileAccount')->name('mymobile');

//route for mylte login page
Route::get('/mylte', 'HomeController@myLTEAccount')->name('lteaccount');

//route for buy iphon
Route::get('/buy_iphonex', 'HomeController@buyiPhoneX')->name('buyiphonex');

//route for show iphone x
Route::get('/showiphonex', 'HomeController@showiPhoneX')->name('showiphonex');

//route for show lte true 4g x
Route::get('/lte_true_4g', 'HomeController@showLTEtrue4G')->name('ltetrue4g');

//route for buy load
Route::get('/reload', 'HomeController@reload')->name('reload');

//route for reaload payment
Route::get('/reloadpayment', 'HomeController@reloadpayment')->name('reloadpayment');

//route for reaload payment
Route::get('/successpayment', 'HomeController@successpayment')->name('successpayment');


