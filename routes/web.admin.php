<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'BannersController@index')->name('.index');

Route::group([
    'as' => '.',
], function () {
    Route::resource('articles', 'ArticlesController')->except('show');
    Route::resource('tags', 'TagsController')->except('show');
    Route::resource('faq', 'FAQsController')->except('show');
    Route::resource('reviews', 'ReviewsController')->except('create', 'store', 'show');
    Route::resource('courses', 'CoursesController')->except('show');
    Route::resource('materials', 'MaterialsController')->except('show');
    Route::resource('pages', 'PagesController')->except('show', 'create', 'store', 'destroy');
    Route::resource('vacancies', 'VacanciesController')->except('show');
    Route::resource('responds', 'RespondsController')->except('create', 'store', 'show');
    Route::resource('users', 'UsersController')->except('show');
    Route::resource('teachers', 'TeachersController')->except('show');
    Route::resource('students', 'StudentsController')->except('show');
    Route::resource('banners', 'BannersController')->except('show', 'create', 'store', 'destroy');
    Route::resource('galleries', 'GalleriesController')->except('show');
    Route::resource('feedback', 'FeedbackController')->except('create', 'store', 'show');
    Route::resource('quotes', 'QuotesController')->except('show', 'create', 'store', 'destroy');
    Route::resource('aspects', 'AspectsController')->except('show');
    Route::delete('media/{media}', 'MediaController@destroy')->name('media.delete');

    Route::resource('slides', 'SlidesController')->except('show');

    Route::group([
        'as' => 'settings.',
        'prefix' => 'settings',
    ], function () {
        Route::get('/', 'SettingsController@index')->name('index');
        Route::patch('/', 'SettingsController@update')->name('update');
    });

    Route::patch('{model}', 'OrderController@reorder')->name('reorder');
});

