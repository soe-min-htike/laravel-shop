<?php

use Illuminate\Support\Facades\Route;

Route::get('/','admin\PostController@index')->name('homepage');
Route::get('/post/view/{id}','admin\PostController@show')->name('post.show');
Route::post('/post/view/{id}','admin\OrderController@store');


Route::get('/category/show/{id}','admin\PostController@categoryshow')->name('category.show');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/cart/{id}','admin\PostController@cart')->name('addtocart');

Route::group(['prefix' => 'admin','namespace'=>'admin','middleware'=>'auth'], function () {
    Route::get('post/create','PostController@create')->name('post.create');
    Route::post('post/create','PostController@store')->name('post.store');

    Route::get('category/create','CategoryController@create')->name('category.create');
    Route::post('category/create','CategoryController@store')->name('category.store');
    Route::get('post/delete/{id}','PostController@destroy')->name('post.delete');
    Route::get('post/update/{id}','PostController@edit');
    Route::post('post/update/{id}','PostController@update');
    Route::get('product','OrderController@index');

    Route::get('test','OrderController@test');
});
