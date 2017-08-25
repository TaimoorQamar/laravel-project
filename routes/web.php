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




Route::group(['middleware' =>['guest']],function(){
    Route::get('/register', 'AuthController@getRegister');
    Route::get('/login' , 'AuthController@getLogin');

    Route::post('/register', 'AuthController@postRegister');
    Route::post('/login', 'AuthController@postLogin');

});

Route::group(['middleware' =>['auth']],function (){
    Route::resource('products','ProductController');
    Route::get('/logout' ,'AuthController@logout');
    Route::get('/', 'ProductController@index');

    Route::get('/add-product/{id}', 'ProductController@Add')->name('add-product');
    Route::get('/add', 'ProductController@view')->name('addview');

    Route::get('/removeItem/{productId}', 'ProductController@removeItem');






});
