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

Route::auth();

/*
 * Social Authentication
 */
Route::get('auth/{provider}', [
    'uses' => 'Auth\SocialAuthController@redirectToProvider',
    'as' => 'social.login',
]);
Route::get('auth/{provider}/callback', 'Auth\SocialAuthController@handleProviderCallback');

/**
 * User Dashboard routes
 */
Route::group(['prefix' => 'user', 'middleware' => 'auth'], function () {
    // place your route definitions here
    Route::get('/dashboard', 'UserDashboardController@index');
    Route::get('/upload', 'UserDashboardController@upload');
    Route::post('/upload', 'UserDashboardController@storeVideo');
});
