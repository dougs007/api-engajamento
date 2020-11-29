<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('login', 'Auth\LoginController@login');

// Auth Routes.
Route::group([
    'prefix' => 'v1',
    'namespace' => 'Auth',
    'middleware' => 'auth.jwt'
], function () {

    Route::post('auth/logout', 'LoginController@logout');
    Route::post('auth/me', 'LoginController@me');
    // Route::post('auth/refresh', 'LoginController@refresh');
});

Route::group([
    'prefix' => 'v1',
    'namespace' => 'Api',
    'middleware' => 'auth.jwt'
], function () {

    # Helped Persons.
    Route::get('/helpedPersons', 'HelpedPersonApiController@all');
    Route::post('/helpedPersons', 'HelpedPersonApiController@createHelpedPerson');
    Route::put('/helpedPersons/{personId}', 'HelpedPersonApiController@udpateHelpedPerson');
    Route::get('/helpedPersons/{personId}', 'HelpedPersonApiController@findHelpedPersonById');
    Route::get('/helpedPersons/leader/{leaderId}', 'HelpedPersonApiController@getAllByLeaderId');
    Route::delete('/helpedPersons/{leaderId}', 'HelpedPersonApiController@delete');

    # Activities
    Route::get('/activities', 'ActivityApiController@all');
    Route::post('/activities', 'ActivityApiController@createActivity');
    Route::put('/activities/{activityId}', 'ActivityApiController@updateActivity');
    Route::get('/activities/{activityId}', 'ActivityApiController@findActivityById');
    Route::delete('/activities/{activityId}', 'ActivityApiController@delete');
});
