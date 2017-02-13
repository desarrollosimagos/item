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


Route::group(['middleware' => ['web']], function () {

    Route::get('/{pages?}', 'MainController@page');
	
	Route::get('/{pages?}/{id?}', 'MainController@view');
	
	//Route::get('/{pages?}/{page?}', 'MainController@page');

    Route::get('lang/lang/{lang}', function ($lang) {
        session(['lang' => $lang]);
        return \Redirect::back();
    })->where([
        'lang' => 'pt|es|en'
    ]);

});

