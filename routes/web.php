<?php

use Illuminate\Support\Facades\Route;
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



Route::group(['namespace' => 'Frontend'],function(){

    Auth::routes(['reset' => false]);
    Route::get('/login','Auth\LoginController@showLoginForm')->name('login');
    Route::post('/login','Auth\LoginController@attemptLogin')->name('login');

    Route::get('/register','Auth\RegisterController@showRegistrationForm')->name('register');
    Route::post('/register','Auth\RegisterController@register')->name('register');
    Route::post('logout', 'Auth\LoginController@logout')->name('logout');

    // Route::get('register','Auth\LoginController@regi');
    Route::get('/','HomeController@index')->name('home');
    Route::get('accept',function(){
        return view('Frontend.accept');
    })->name('accept');
});

Route::group(['middleware' => 'auth','prefix' => 'webpanel'],function(){
    Route::get('created_salepage','Backend\SalepageController@index')->name('salepage.index');
    Route::post('created_salepage','Backend\SalepageController@store')->name('salepage.store');
    Route::get('created_salepage/{id}','Backend\SalepageController@show')->name('salepage.show');

    Route::post('image_upload/store/{id}','Backend\ImageController@store')->name('image.store');
    Route::post('image_upload/{id}/destroy','Backend\ImageController@destroy')->name('image.destroy');

    Route::get('personal','Backend\PersonalController@index')->name('personal.index');
    Route::post('personal/update/{id}','Backend\PersonalController@update')->name('personal.update');

    Route::get('check-order','Backend\CheckorderController@index')->name('checkorder.index');
    Route::get('check-order/{id}','Backend\CheckorderController@show')->name('checkorder.show');

    Route::Get('payment','Backend\PaymentController@index')->name('payment.index');

    Route::Get('change-password','Backend\PasswordResetController@index')->name('password.change');

});
