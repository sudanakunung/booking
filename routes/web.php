<?php

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

Route::get('/', 'FrntController@index');
Route::get('/properties', 'FrntController@properties');
Route::get('/property/{slug}', 'FrntController@property');
Route::get('/area/{id}', 'FrntController@area');
Route::get('/desa-wisata', 'FrntController@desa_wisata');
Route::match(['get', 'post'], '/check-availability', 'FrntController@check_date');
route::any('/order','FrntController@forget');

// administrator
Route::match(['get', 'post'], '/log-in', 'AdmController@login');
Route::get('/logout', 'AdmController@logout');
Auth::routes();
Route::group(['middleware' => ['auth']], function(){
	Route::get('/dashboard', 'AdmController@dashboard');
	Route::get('/dashboard/booking', 'AdmController@booking');
	Route::get('/dashboard/profile', 'AdmController@profile');

	// password
	Route::get('/dashboard/change-password', 'AdmController@change_password');
	Route::match(['get', 'post'], '/dashboard/update-password', 'AdmController@update_password');

	// property
	Route::get('/dashboard/property', 'AdmController@property');
	Route::get('/dashboard/property/add', 'AdmController@property_add');
	Route::match(['get', 'post'], '/dashboard/property/upload', 'AdmController@property_upload');
	Route::match(['get', 'post'], '/dashboard/property/edit/{uid}', 'AdmController@property_edit');
	Route::match(['get', 'post'], '/dashboard/property/edit/save/{uid}', 'AdmController@property_edit_save');
	Route::get('/dashboard/property/delete/{uid}', 'AdmController@property_delete');
	Route::get('/dashboard/property-facility/delete/{uid}/{fid}', 'AdmController@property_facility_delete');
	Route::get('/dashboard/property-gallery/delete/{uid}/{id}', 'AdmController@property_gallery_delete');

	// facility
	Route::get('/dashboard/facility', 'AdmController@facility');
	Route::match(['get', 'post'], '/dashboard/facility/add', 'AdmController@facility_add');
	Route::match(['get', 'post'], '/dashboard/facility/edit/{id}', 'AdmController@facility_edit');
	Route::match(['get', 'post'], '/dashboard/facility/edit/save/{id}', 'AdmController@facility_edit_save');
	Route::match(['get', 'post'], '/dashboard/facility/delete/{id}', 'AdmController@facility_delete');

	// city
	Route::get('/dashboard/city', 'AdmController@city');
	Route::match(['get', 'post'], '/dashboard/city/add', 'AdmController@city_add');
	Route::match(['get', 'post'], '/dashboard/city/edit/{id}', 'AdmController@city_edit');
	Route::match(['get', 'post'], '/dashboard/city/edit/save/{id}', 'AdmController@city_edit_save');
	Route::match(['get', 'post'], '/dashboard/city/delete/{id}', 'AdmController@city_delete');
});
