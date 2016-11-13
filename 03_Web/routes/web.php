<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('index');
});


Route::get('auth/login', 'Auth\LoginController@showLoginForm');


Route::group(['domain' => '{account}.home.gdb.kr'], function () {
    Route::get('user/{id}', function ($account, $id) {
      return "USER ID : ".$id."\nACCOUNT : ".$account;
    });
});

Route::get('register', function(){
  return view('auth.register');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/tttt', function(){
  DB::table('feed')->insert([
    ['created_at'=>date('Y-m-d H:i:s',time())]
  ]
  );
});
Route::get('/schedule', 'HomeController@schedule');
Route::get('/dashboard', 'HomeController@dashboard');
Route::get('/user', 'HomeController@dashboard');
