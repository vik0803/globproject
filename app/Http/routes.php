<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('client', 'ClientController@index');
Route::get('client/{id}', 'ClientController@show');
Route::post('client', 'ClientController@store');
Route::delete('client/{id}', 'ClientController@destroy');


// Project Note
Route::get('project/{id}/note', 'ProjectNoteController@index');
Route::post('project/{id}/note', 'ProjectNoteController@store');
Route::get('project/{id}/note/{noteId}', 'ProjectNoteController@show');
Route::put('project/{id}/note/{noteId}', 'ProjectNoteController@update');
Route::delete('project/{id}/note/{noteId}', 'ProjectNoteController@destroy');

// Project
Route::get('project', 'ProjectController@index');
Route::get('project/{id}', 'ProjectController@show');
Route::post('project', 'ProjectController@store');
Route::delete('project/{id}', 'ProjectController@destroy');





