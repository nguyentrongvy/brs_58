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

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function() {
    Route::get('/home', ['as' => 'get.admin.home', 'uses' => 'HomeController@index']);
    Route::get('category', ['as' => 'get.category.admin', 'uses' => 'CategoryController@getCategory']);
    Route::post('category', ['as' => 'post.category.admin', 'uses' => 'CategoryController@updateCategory']);
});


//login user
Route::group(['namespace' => 'Front'], function() {
    Route::get('/login', ['as' => 'get.login.front', 'uses' => 'LoginController@getLogin']);
    Route::post('/login', ['as' => 'post.login.front', 'uses' => 'LoginController@postLogin']);
    Route::get('/', ['as' => 'get.home.front', 'uses' => 'HomeController@index']);
});

//register
Route::group(['namespace' => 'Auth'], function() {
    Route::get('/register', ['as' => 'register', 'uses' => 'RegisterController@showRegistrationForm']);
    Route::post('/register', 'RegisterController@register');
});

Route::group(['namespace' => 'Front', 'middleware' => 'isUser'], function() {
    Route::get('your-profile/{id}',['as' => 'get.profile.user', 'uses' => 'UserProfileController@getProfile']);
    Route::post('your-profile/{id}',['as' => 'post.profile.user', 'uses' => 'UserProfileController@updateProfile']);
    Route::get('/change-password/{id}', ['as' => 'get.change-password.user', 'uses' => 'UserProfileController@getPassWord']);
    Route::post('/change-password/{id}', ['as' => 'post.change-password.user', 'uses' => 'UserProfileController@changePassword']);
});

