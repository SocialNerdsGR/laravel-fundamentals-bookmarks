<?php

Route::get('/', 'BookmarksController@index')->name('home');
Route::view('create', 'bookmarks.create');
Route::post('/', 'BookmarksController@store');
Route::delete('/{bookmark}', 'BookmarksController@delete');
