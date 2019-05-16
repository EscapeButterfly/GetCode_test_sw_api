<?php

Route::prefix('sw')->group(function () {
    Route::prefix('people')->group(function () {
        Route::get('/', 'GetCode\SW\Http\Controllers\PeopleController@index')->name('sw.people.index');
        Route::get('/{id}', 'GetCode\SW\Http\Controllers\PeopleController@byId')->name('sw.people.byId');
    });
});