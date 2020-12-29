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


Route::get('/admin', function () {
	return view('auth.login');
	});

//Admin
Route::post('exit','Auth\LoginController@logout');
Route::group(['prefix' => 'admin', 'middleware'=>'auth'], function (){
		Route::group(['prefix'=> 'pengguna'], function() {
			Route::get('/', 'UserController@index');
			Route::post('input', 'UserController@input');
			Route::post('detail/{id}','UserController@detail');
			Route::post('hapus','UserController@delete');
		});
		Route::group(['prefix'=> 'index'], function() {
			Route::get('/','VillageController@maps');
		});

		Route::group(['prefix'=> 'penyuluh'], function(){
			Route::get('/','OfficialController@index');
			Route::post('input','OfficialController@input');
			Route::get('detail/{id}','OfficialController@get_official');
			Route::get('hapus/{id}','OfficialController@delete');
		});
		Route::group(['prefix'=> 'kelompok/tani'], function(){
			Route::get('/','Farmer_GroupController@index');
			Route::post('input','Farmer_GroupController@input');
			Route::get('detail/{code}','Farmer_GroupController@get_group');
			Route::get('hapus/{code}','Farmer_GroupController@delete');
		});
		Route::group(['prefix'=> 'hasil/pertanian'], function(){
			Route::get('/','HarvestController@index');
			Route::post('input','HarvestController@input');
			Route::get('detail/{code}','HarvestController@get_harvest');
			Route::get('hapus/{code}','HarvestController@delete');
			Route::post('input/komoditas','ComodityController@input');
		});
		Route::group(['prefix'=> 'bendungan'], function(){
			Route::get('/','DamController@index');
			Route::post('input','DamController@input');
			Route::get('detail/{id}','DamController@get_Dam');
			Route::get('hapus/{id}','DamController@delete');
			Route::post('update','DamController@update');
		});
		Route::group(['prefix'=> 'desa'], function(){
			Route::get('/','VillageController@index');
			Route::post('input','VillageController@input');
			Route::post('update','VillageController@update');
			Route::get('detail/{id}','VillageController@get_village');
			Route::get('hapus/{id}','VillageController@delete');
		});

		Route::group(['prefix'=> 'kegiatan'], function(){
			Route::get('/','ActivityController@index');
			Route::post('input','ActivityController@input');
			Route::get('hapus/{id}','ActivityController@delete');
			Route::get('detail/{id}','ActivityController@get_activity');
			Route::post('update','ActivityController@update');
		});

		Route::group(['prefix'=> 'pasar'], function(){
			Route::get('/','MarketController@index');
			Route::post('input','MarketController@input');
			Route::Post('hapus/{id}','MarketController@delete');
			Route::get('detail/{id}','MarketController@get_market');
			Route::post('update','MarketController@update');
		});

});
//Frontend
	Route::get('/','FrontendController@index');
//
	Route::get('toko/pertanian','FrontendController@store');
	Route::get('bendungan/air','FrontendController@dam');
	Route::get('hasil/pertanian','FrontendController@harvest');
	Route::get('/hasil/pertanian/get/{code}','FrontendController@get_harvest');
	Route::get('/hasil/pertanian/search','FrontendController@harvest_search');
	Route::get('petugas/bpp','FrontendController@official');
	Route::get('gallery/kegiatan','FrontendController@activity');
	Route::get('gallery/kegiatan/get/{code}','FrontendController@get_activity');
	//kelompok Tani
	Route::get('kelompok/tani','FrontendController@farmer');
	Route::get('kelompok/tani/get/{code}','FrontendController@get_farmer');
	//lokasi pasar
	Route::get('lokasi/pasar','FrontendController@market');
	Route::get('lokasi/pasar/get/{id}','FrontendController@get_market');


Route::get('one','JajalController@index');
Route::get('many','JajalController@article');

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
