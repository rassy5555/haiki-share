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


/*
|--------------------------------------------------------------------------
| 1) User 認証不要
|--------------------------------------------------------------------------
*/
Route::get('/', function () { return redirect('/home'); });
 
/*
|--------------------------------------------------------------------------
| 2) User ログイン後
|--------------------------------------------------------------------------
*/
Route::group(['middleware' => 'auth:user'], function() {
    Route::get('/home', 'HomeController@index')->name('home');
});
 
/*
|--------------------------------------------------------------------------
| 3) Convini 認証不要
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'convini','middleware'=>'guest:convini','middleware'=>'guest:user'], function() {
    Route::get('/',         function () { return redirect('/convini/home'); });
    Route::get('login',     'Convini\LoginController@showLoginForm')->name('convini.login');
    Route::post('login',    'Convini\LoginController@login');
    Route::get('register',     'Convini\RegisterController@showRegister')->name('convini.register');
    Route::post('register',    'Convini\RegisterController@register');
});
 
/*
|--------------------------------------------------------------------------
| 4) Convini ログイン後
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'convini', 'middleware' => 'auth:convini'], function() {
    Route::post('logout',   'Convini\LoginController@logout')->name('convini.logout');
    Route::get('home',      'Convini\HomeController@index')->name('convini.home');
    Route::get('profileEdit', 'Convini\HomeController@profileEditShow')->name('convini.home');
});