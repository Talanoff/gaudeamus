<?php

use Illuminate\Support\Facades\Route;



    Route::get('/', 'HomeController@index')->name('home');
    Route::get('reviews', 'ReviewsController@index')->name('reviews');
    Route::post('reviews', 'ReviewsController@store')->name('reviews.create');
    Route::get('articles', 'ArticlesController@index')->name('articles');
    Route::get('articles/show', 'ArticlesController@show')->name('articles.show');

