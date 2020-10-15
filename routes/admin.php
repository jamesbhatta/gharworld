<?php

use Illuminate\Support\Facades\Route;

Route::get('dashboard', 'DashboardController@index')->name('admin.dashboard');

Route::resources(
    [
        'cities' => 'CityController',
        'professions' => 'ProfessionController',
        'facilities' => 'FacilityController',
        'features' => 'FeatureController',
        'properties' => 'PropertyController',
        'local-contacts' => 'LocalContactController',
    ]
);

Route::get('property-images/{property_id}', 'PropertyImageController@index')->name('property-images.index');
Route::post('property-images', 'PropertyImageController@store')->name('property-images.store');
Route::delete('property-images/{propertyImage}', 'PropertyImageController@destroy')->name('property-images.destroy');
Route::post('contact', 'ContactController@store')->name('contact.store');
Route::get('contact', 'ContactController@index')->name('contact.index');
Route::delete('contact/{contact}', 'ContactController@destroy')->name('contact.destroy');
Route::put('properties','PropertyController@search')->name('property-search');
Route::put('local-contacts','LocalContactController@search')->name('localcontact-search');


Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index')->name('system.logs');
