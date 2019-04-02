<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@index')->name('home');
Route::post('/', 'FeedbackController@store')->name('feedback.create');

Route::get('faqs', 'FAQsController@index')->name('faqs');
Route::get('thanks', 'ThanksController@index')->name('thanks');
Route::get('galleries', 'GalleriesController@index')->name('galleries');
Route::get('search', 'SearchController@index')->name('search');

Route::get('about', 'PagesController@about')->name('about');
Route::get('contacts', 'PagesController@contacts')->name('contacts');
Route::get('rules', 'PagesController@rules')->name('rules');

Route::group([
    'as' => 'materials.',
    'prefix' => 'materials'
], function() {
    Route::get('', 'MaterialsController@index')->name('index');
    Route::get('{material}', 'MaterialsController@getModalData')->name('modal');
});

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
    Route::get('{material}', 'CoursesController@getModalData')->name('modal');
});

Route::group([
    'as' => 'reviews.',
    'prefix' => 'reviews'
], function () {
    Route::get('/', 'ReviewsController@index')->name('index');
    Route::post('/', 'ReviewsController@store')->name('create');
});

Route::group([
    'as' => 'cabinet.',
    'prefix' => 'cabinet'
], function () {
    Route::get('/', 'CabinetController@index')->name('index');
    Route::patch('/', 'CabinetController@update')->name('update');

});


Route::group([
    'as' => 'vacancies.',
    'prefix' => 'vacancies'
], function () {
    Route::get('/', 'VacanciesController@index')->name('index');
    Route::post('/', 'VacanciesController@store')->name('store');
});