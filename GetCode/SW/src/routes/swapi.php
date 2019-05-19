<?php

Route::prefix('sw')->group(function () {

    Route::prefix('api')->group(function () {
        Route::get('/default', 'GetCode\SW\Http\Controllers\SWapiController@getBaseData')->name('sw.api.default');
    });

    Route::prefix('people')->group(function () {
        Route::get('/', 'GetCode\SW\Http\Controllers\PeopleController@index')->name('sw.people.index');
        Route::get('/{id}', 'GetCode\SW\Http\Controllers\PeopleController@getById')->name('sw.people.byId');
        Route::post('/create', 'GetCode\SW\Http\Controllers\PeopleController@create')->name('sw.people.create');
        Route::patch('/edit/{id}', 'GetCode\SW\Http\Controllers\PeopleController@update')->name('sw.people.update');
        Route::delete('/delete/{id}', 'GetCode\SW\Http\Controllers\PeopleController@delete')->name('sw.people.delete');
        Route::get('/world/{id}', 'GetCode\SW\Http\Controllers\PeopleController@getPeopleByWorld')->name('sw.people.by.world');
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