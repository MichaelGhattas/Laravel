<?php

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register all of the routes for an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the Closure to execute when that URI is requested.
  |
 */

//LOGIN/LOGOUT/SESSION
Route::get('login', 'SessionsController@create');
Route::get('logout', 'SessionsController@destroy');
Route::resource('sessions', 'SessionsController');

//HOME PAGE
Route::get('/','HomeController@home');

//AUTHENTICATE USER
Route::group(array('before'=>'auth'), function() {
});

//AUTHENTICATE ADMIN
Route::group(array('before'=>'auth'), function() {
    if(!Auth::user())
        Redirect::to ('login');
    else{
    if(Auth::user()->isAdmin == 1){
        Route::resource('users', 'UsersController');
        Route::resource('sizes', 'SizesController');
        Route::resource('sizes.measurements', 'MeasurementsController');
        Route::get('admin',function(){
            return View::make('admin');
    
        });
    }else{
        return 'You are logged in but not an admin';
    }
    }
    
});