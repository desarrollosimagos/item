<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|

Route::get('/', function () {
    return view('welcome2');
});

*/


//Route::get('/', 'MainController@index');
Route::get('/index_json', 'PortofolioController@index_json');
Route::get('/customers_json', 'CustomersController@customers_json');

Route::get('/number_json', 'PortofolioController@number_json');
Route::get('/number_customers', 'CustomersController@number_customers');

Route::post('/reg_mail', 'RegistrosController@registro_mails');
Route::post('/find_mail', 'RegistrosController@find_mail');

Route::post('/reg_message', 'RegistrosController@registro_message');

Route::post('/reg_postulation', 'RegistrosController@registro_postulation');

//Route::get('/customers', 'CustomersController@page');
    
Route::get('/find_portofolios', 'BuscadorController@page');

Route::group(['middleware' => ['web']], function () {

    Route::get('/customers', 'CustomersController@page');

    Route::get('/{pages?}', 'MainController@page');
	
	Route::get('/{pages?}/{id?}', 'MainController@view');

    Route::get('lang/lang/{lang}', function ($lang) {
        session(['lang' => $lang]);
        return \Redirect::back();
    });
    
    //Route::get('lang/lang/{lang}', function ($lang) {
    //    session(['lang' => $lang]);
    //    return \Redirect::back();
    //})->where(['lang' => 'pt|es|en']);

});

