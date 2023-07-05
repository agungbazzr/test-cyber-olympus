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

Route::group(['middleware' => 'auth'],function() {
    
    // route Customer
        Route::group(['prefix' => 'customer'],function() {
            Route::get('/', 'CustomerController@index')->name('customer.index');
            Route::get('/create', 'CustomerController@create')->name('customer.create');
            Route::post('/store', 'CustomerController@store')->name('customer.store');
            Route::get('/destroy/{id}', 'CustomerController@destroy')->name('customer.destroy');
            Route::get('/edit/{id}', 'CustomerController@edit')->name('customer.edit');
            Route::put('/update/{id}', 'CustomerController@update')->name('customer.update');
        }); 
    
    
    // route user
        Route::group(['prefix' => 'user'],function() {
            Route::get('/', 'UserController@index')->name('user.index');
            Route::get('/create', 'UserController@create')->name('user.create');
            Route::post('/store', 'UserController@store')->name('user.store');
            Route::get('/destroy/{id}', 'UserController@destroy')->name('user.destroy');
            Route::get('/edit/{id}', 'UserController@edit')->name('user.edit');
            Route::put('/update/{id}', 'UserController@update')->name('user.update');
            Route::get('/change','UserController@change')->name('user.change');
            Route::post('/updatePassword','UserController@updatePassword')->name('user.updatePassword');
        });
    
    });
    Auth::routes();
    Route::get('/forgot-password', function () {
        return view('auth.passwords.email');
    })->middleware(['guest'])->name('password.request');
    Route::get('/', 'HomeController@index');
    Route::get('/home', 'HomeController@index');
    
