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

//login admin
Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function() {
    Route::get('/login', ['as' => 'get.login.admin', 'uses' => 'LoginController@getLogin']);
    Route::post('/login', ['as' => 'get.login.admin', 'uses' => 'LoginController@postLogin']);
});

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'isAdmin'], function() {
    Route::get('/home', ['as' => 'get.admin.home', 'uses' => 'HomeController@index']);
});


//login user
Route::group(['namespace' => 'Front'], function() {
    Route::get('/login', ['as' => 'get.login.front', 'uses' => 'LoginController@getLogin']);
    Route::post('/login', ['as' => 'post.login.front', 'uses' => 'LoginController@postLogin']);
});

//register
Route::group(['namespace' => 'Auth'], function() {
    Route::get('/register', [
    	'as' => 'register',
    	'uses' => 'RegisterController@showRegistrationForm'
    ]);
    Route::post('/register', 'RegisterController@register');
});


Route::group(['namespace' => 'Front', 'middleware' => 'isUser'], function() {
    Route::get('/index', ['as' => 'get.home.front', 'uses' => 'HomeController@index']);
});

