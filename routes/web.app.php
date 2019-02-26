<?php

use Illuminate\Support\Facades\Route;



    Route::get('/', 'HomeController@index')->name('home');
    Route::get('reviews', 'ReviewsController@index')->name('reviews');
    Route::post('reviews', 'ReviewsController@store')->name('reviews.create');
    Route::get('faqs', 'FAQsController@index')->name('faqs');
    Route::get('thanks', 'ThanksController@index')->name('thanks');
    Route::get('galleries', 'GalleriesController@index')->name('galleries');
    Route::get('materials', 'MaterialsController@index')->name('materials');

Route::group([
    'as' => 'articles.',
    'prefix' => 'articles',
], function () {
    Route::get('/', 'ArticlesController@index')->name('index');
    Route::get('{article}', 'ArticlesController@show')->name('show');
});

Route::group([
    'as' => 'teachers.',
    'prefix' => 'teachers',
], function () {
    Route::get('/', 'TeachersController@index')->name('index');
    Route::get('{teacher}', 'TeachersController@show')->name('show');
});

Route::group([
    'as' => 'programs.',
    'prefix' => 'programs',
    ], function () {
   Route::get('/', 'CoursesController@index')->name('index');
   Route::get('{course}', 'CoursesController@show')->name('show');

});


