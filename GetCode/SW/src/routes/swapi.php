<?php

Route::prefix('sw')->group(function () {

    Route::prefix('people')->group(function () {

        Route::get('/', 'GetCode\SW\Http\Controllers\PeopleController@index')->name('sw.people.index');
        Route::get('/{id}', 'GetCode\SW\Http\Controllers\PeopleController@getById')->name('sw.people.byId');
        Route::post('/create', 'GetCode\SW\Http\Controllers\PeopleController@create')->name('sw.people.create');
        Route::patch('/{id}/update', 'GetCode\SW\Http\Controllers\PeopleController@update')->name('sw.people.update');
        Route::delete('/{id}/delete', 'GetCode\SW\Http\Controllers\PeopleController@delete')->name('sw.people.delete');

    });

    Route::prefix('homeworlds')->group(function () {
        Route::get('/', 'GetCode\SW\Http\Controllers\HomeWorldsController@getWorlds')->name('sw.homeworlds.index');
    });

    Route::prefix('films')->group(function () {
        Route::get('/', 'GetCode\SW\Http\Controllers\FilmsController@getFilms')->name('sw.films.index');
    });

});

Route::get('/{any}', function () {
    return view('post');
})->where('any', '.*');