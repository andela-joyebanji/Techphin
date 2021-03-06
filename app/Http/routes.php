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

Route::get('/', 'PagesController@index');
Route::get('/videos', 'PagesController@videos');
Route::get('/videos/{video}', 'PagesController@video')->middleware(['videoviews']);
Route::get('/videos/category/{category}', 'PagesController@categoryVideos');
Route::get('/videos/tag/{tag}', 'PagesController@tagVideos');
Route::get('/videos/user/{user}', 'PagesController@userVideos');
Route::get('/search', 'PagesController@videosSearch');

Route::post('/videos/{video}/comment', 'PagesController@commentVideo')->middleware(['auth']);

Route::auth();

/*
 * Social Authentication
 */
Route::get('auth/{provider}', [
    'uses' => 'Auth\SocialAuthController@redirectToProvider',
    'as'   => 'social.login',
]);
Route::get('auth/{provider}/callback', 'Auth\SocialAuthController@handleProviderCallback');

Route::group(['prefix' => 'api', 'middleware' => 'auth'], function () {
  Route::get('/favourite/{video}', 'ApiController@favourite');
  Route::get('/videos/{video}/delete', 'VideoController@destroy');
});

/*
 * User Dashboard routes
 */
Route::group(['prefix' => 'user', 'middleware' => 'auth'], function () {
    // place your route definitions here
    Route::get('/dashboard', 'UserDashboardController@index');
    Route::get('/upload', 'UserDashboardController@upload');
    Route::get('/uploaded', 'UserDashboardController@uploaded');
    Route::get('/favourited', 'UserDashboardController@favourited');
    Route::get('/profile', 'UserDashboardController@profile');
    Route::get('/edit/video/{video}', 'UserDashboardController@video');

    Route::post('/profile', 'UserDashboardController@updateProfile');
    Route::post('/upload', 'VideoController@store');
    Route::post('/edit/video/{video}', 'VideoController@update');

});
