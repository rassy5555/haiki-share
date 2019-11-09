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
Route::get('/', function () { return redirect('/login'); });
 
/*
|--------------------------------------------------------------------------
| 2) User ログイン後
|--------------------------------------------------------------------------
*/
Route::group(['middleware' => 'auth:user'], function() {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/profileEdit', 'ProfileController@profileEditShow')->name('profileEdit');
    Route::post('/profileEdit', 'ProfileController@profileEdit');
    Route::post('/changePassword', 'ProfileController@changePassword');
    Route::get('/productDetail/{product_id}', 'ProductController@productDetailShow')->name('productDetail');
    Route::post('/productPurchase/{product_id}', 'ProductController@productPurchase');
    Route::post('/productCancell/{product_id}', 'ProductController@productCancell');
    Route::get('/productList', 'ProductController@productListShow')->name('productList');
});
 
/*
|--------------------------------------------------------------------------
| 3) Convini 認証不要
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'convini','middleware'=>'guest:convini','middleware'=>'guest:user'], function() {
    Route::get('/',function () { return redirect('/convini/home'); });
    Route::get('login','Convini\LoginController@showLoginForm')->name('convini.login');
    Route::post('login','Convini\LoginController@login');
    Route::get('register','Convini\RegisterController@showRegister')->name('convini.register');
    Route::post('register','Convini\RegisterController@register');
    Route::get('password/reset', 'Convini\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/email', 'Convini\ForgotPasswordController@sendResetLinkEmail')->name('convini.password.email');
    Route::post('password/reset', 'Convini\PasswordController@reset')->name('password.update');
});
 
/*
|--------------------------------------------------------------------------
| 4) Convini ログイン後
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'convini', 'middleware' => 'auth:convini'], function() {
    Route::post('logout',   'Convini\LoginController@logout')->name('convini.logout');
    Route::get('home',      'Convini\HomeController@index')->name('convini.home');
    Route::get('profileEdit', 'Convini\ProfileController@profileEditShow')->name('convini.profileEdit');
    Route::post('profileEdit', 'Convini\ProfileController@profileEdit');
    Route::post('changePassword', 'Convini\ProfileController@changePassword');
    Route::get('profileEdit', 'Convini\ProfileController@profileEditShow')->name('convini.profileEdit');
    Route::get('productRegister','Convini\ProductController@productRegisterShow')->name('convini.productRegister');
    Route::post('productRegister','Convini\ProductController@productRegister');
    Route::get('productEdit/{product_id}','Convini\ProductController@productEditShow')->name('convini.productEdit');
    Route::post('productEdit/{product_id}','Convini\ProductController@productEdit');
    Route::post('productDelete/{product_id}','Convini\ProductController@productDelete');
    Route::get('productDetail/{product_id}','Convini\ProductController@productDetailShow')->name('convini.productDetail');
    Route::get('productList', 'Convini\ProductController@productListShow')->name('convini.productList');
    Route::get('listingList/{convini_id}','Convini\ProductController@listingListShow')->name('convini.listingList');
    Route::get('saledList/{convini_id}','Convini\ProductController@saledListShow')->name('convini.saledList');
    Route::get('back','Convini\ProductController@back');
});
