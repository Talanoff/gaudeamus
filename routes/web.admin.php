<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'DashboardController@index')->name('.index');

Route::group([
    'as' => '.',
], function () {
    Route::resource('articles', 'ArticlesController');
    Route::resource('tags', 'TagsController');
    Route::resource('faq', 'FaqsController');
    Route::resource('reviews', 'ReviewsController');
    Route::resource('courses', 'CoursesController');
    Route::resource('materials', 'MaterialsController');
    Route::resource('pages', 'PagesController');
    Route::resource('vacancies', 'VacanciesController');
    Route::resource('users', 'UsersController');
    Route::resource('teachers', 'TeachersController');
    Route::resource('students', 'StudentsController');
    Route::resource('banners', 'BannersController');

    Route::resource('slides', 'SlidesController');

    Route::group([
        'as' => 'settings.',
        'prefix' => 'settings',
    ], function () {
        Route::get('/', 'SettingsController@index')->name('index');
        Route::patch('/', 'SettingsController@update')->name('update');
    });
});

