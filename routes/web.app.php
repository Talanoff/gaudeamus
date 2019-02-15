<?php

use Illuminate\Support\Facades\Route;

<<<<<<< HEAD

    Route::get('/', 'HomeController@index')->name('home');
    Route::get('reviews', 'ReviewsController@index')->name('reviews');
    Route::post('reviews', 'ReviewsController@store')->name('reviews.create');
    Route::get('articles', 'ArticlesController@index')->name('articles');
    Route::get('articles/show', 'ArticlesController@show')->name('articles.show');

=======
Route::get('/', 'HomeController@index')->name('.home');
>>>>>>> origin/master
