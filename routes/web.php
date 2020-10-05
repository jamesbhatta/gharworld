<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();

Route::get('login/{provider}', 'Auth\LoginController@redirectToProvider')->name('login.social');
Route::get('login/{provider}/callback', 'Auth\LoginController@handleProviderCallback')->name('login.social.callback');


Route::get('/profile', 'UserController@profile')->name('user.profile');
Route::put('/profile/update/{user}', 'UserController@updateProfile')->name('user.profile.update');

Route::get('page/{page}', 'PageController@index');

Route::group(['namespace' => 'Frontend'], function () {
    Route::get('/', 'HomeController@index')->name('frontend.home');
});
