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
    return view('app');
});

// OAuth
Route::post('oauth/access_token', function() {
    return Response::json(Authorizer::issueAccessToken());
});


Route::group(['middleware' => 'oauth'], function(){

    // Client
    Route::resource('client', 'ClientController', ['except' => ['create', 'edit']]);

    // Project
    Route::resource('project', 'ProjectController', []);

    // Project Note
    Route::group(['prefix' => 'project'], function(){

        // Notes
        Route::get('{id}/note', 'ProjectNoteController@index');
        Route::post('{id}/note', 'ProjectNoteController@store');
        Route::get('{id}/note/{noteId}', 'ProjectNoteController@show');
        Route::put('{id}/note/{noteId}', 'ProjectNoteController@update');
        Route::delete('note/{id}', 'ProjectNoteController@destroy');

        // Files
        Route::get('{id}/file', 'ProjectFileController@index');
        Route::get('file/{fileId}', 'ProjectFileController@show');
        Route::get('file/{fileId}/download', 'ProjectFileController@showFile');
        Route::post('{id}/file', 'ProjectFileController@store');
        Route::put('{id}/file', 'ProjectFileController@update');
        Route::delete('{id}/file', 'ProjectFileController@destroy');

        // Members
        Route::get('{id}/members', 'ProjectController@members');

        // Tasks
        Route::get('{id}/task', 'ProjectTasksController@index');
        Route::post('{id}/task', 'ProjectTasksController@store');
        Route::get('{id}/task/{noteId}', 'ProjectTasksController@show');
        Route::put('{id}/task/{noteId}', 'ProjectTasksController@update');
        Route::delete('{id}/task/{noteId}', 'ProjectTasksController@destroy');
    });

    // Obter dados do usuário
    Route::get('user/authenticated', 'UserController@authenticated');
});
