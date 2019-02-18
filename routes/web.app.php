<?php

use Illuminate\Support\Facades\Route;



    Route::get('/', 'HomeController@index')->name('home');
    Route::get('reviews', 'ReviewsController@index')->name('reviews');
    Route::post('reviews', 'ReviewsController@store')->name('reviews.create');


Route::group([
    'as' => 'articles.',
    'prefix' => 'articles',
], function () {
    Route::get('/', 'ArticlesController@index')->name('index');
    Route::get('{article}', 'ArticlesController@show')->name('show');
});


