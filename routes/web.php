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



Route::group(['namespace' => 'Frontend'], function () {
    Route::get('/', 'HomeController@index')->name('frontend.home');
    Route::get('properties/real-estate', 'PropertyController@realEstate')->name('frontend.property.real-estate');
    Route::get('properties/room-rent', 'PropertyController@roomRent')->name('frontend.property.room-rent');
    Route::get('properties/search', 'PropertyController@search')->name('frontend.property.search');
    Route::get('local-contacts/search', 'LocalContactController@search')->name('frontend.local-contacts.search');
    Route::get('professions', 'ProfessionController@index')->name('frontend.professions');
    Route::get('professions/{profession}', 'ProfessionController@show')->name('frontend.professions.show');
    Route::get('localcontact-profile/{localContact}', 'LocalContactController@show')->name('frontend.localcontact.show');
    Route::get('properties-profile/{property}', 'PropertyController@show')->name('frontend.property.show');
    Route::get('contact', 'ContactController@index')->name('frontend.contact.show');
    Route::get('change-password', 'ChangePasswordController@index')->name('frontend.change-password.index')->middleware('auth');
    Route::post('change-password', 'ChangePasswordController@change')->name('frontend.change-password.change')->middleware('auth');

});


Route::get('page/{page}', 'PageController@index');
