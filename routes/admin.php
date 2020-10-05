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

Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index')->name('system.logs');
