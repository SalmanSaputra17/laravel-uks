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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'PasienController@show')->name('home');
Route::middleware('auth')->group(function(){

  Route::get('/obat/cariObat', 'ObatController@search')->name('obat.search');
  Route::get('/obat/export', 'ObatController@export')->name('obat.export');
  Route::get('/obat', 'ObatController@index')->name('obat.index');
  Route::get('/obat/create', 'ObatController@create')->name('obat.create');
  Route::post('/obat/create', 'ObatController@store')->name('obat.store');
  Route::get('/obat/{obat}/edit', 'ObatController@edit')->name('obat.edit');
  Route::PATCH('/obat/{obat}/edit', 'ObatController@update')->name('obat.update');
  Route::delete('/obat/{obat}/delete', 'ObatController@destroy')->name('obat.delete');

  Route::get('/pasien/cariPasien', 'PasienController@search')->name('pasien.search');
  Route::get('/pasien/export', 'PasienController@export')->name('pasien.export');
  Route::get('/pasien', 'PasienController@index')->name('pasien.index');
  Route::get('/pasien/create', 'PasienController@create')->name('pasien.create');
  Route::post('/pasien/create', 'PasienController@store')->name('pasien.store');
  Route::get('/pasien/{pasien}/edit', 'PasienController@edit')->name('pasien.edit');
  Route::PATCH('/pasien/{pasien}/edit', 'PasienController@update')->name('pasien.update');
  Route::delete('/pasien/{pasien}/delete', 'PasienController@destroy')->name('pasien.delete');

  Route::get('/pasien2/cariPasien', 'Pasien2Controller@search')->name('pasien2.search');
  Route::get('/pasien2/export', 'Pasien2Controller@export')->name('pasien2.export');
  Route::get('/pasien2', 'Pasien2Controller@index')->name('pasien2.index');  
  Route::get('/pasien2/create', 'Pasien2Controller@create')->name('pasien2.create');
  Route::post('/pasien2/create', 'Pasien2Controller@store')->name('pasien2.store');
  Route::get('/pasien2/{pasien2}/edit', 'Pasien2Controller@edit')->name('pasien2.edit');
  Route::PATCH('/pasien2/{pasien2}/edit', 'Pasien2Controller@update')->name('pasien2.update');
  Route::delete('/pasien2/{pasien2}/delete', 'Pasien2Controller@destroy')->name('pasien2.delete');

  Route::get('/fasilitas/cariFasilitas', 'FasilitasController@search')->name('fasilitas.search');
  Route::get('/fasilitas/export', 'FasilitasController@export')->name('fasilitas.export');
  Route::get('/fasilitas', 'FasilitasController@index')->name('fasilitas.index');
  Route::get('/fasilitas/create', 'FasilitasController@create')->name('fasilitas.create');
  Route::post('/fasilitas/create', 'FasilitasController@store')->name('fasilitas.store');
  Route::get('/fasilitas/{fasilitas}/edit', 'FasilitasController@edit')->name('fasilitas.edit');
  Route::PATCH('/fasilitas/{fasilitas}/edit', 'FasilitasController@update')->name('fasilitas.update');
  Route::delete('/fasilitas/{fasilitas}/delete', 'FasilitasController@destroy')->name('fasilitas.delete');

  Route::get('/rayon/cariRayon', 'RayonController@search')->name('rayon.search');
  Route::get('/rayon', 'RayonController@index')->name('rayon.index');
  Route::get('/rayon/create', 'RayonController@create')->name('rayon.create');
  Route::post('/rayon/create', 'RayonController@store')->name('rayon.store');
  Route::get('/rayon/{rayon}/edit', 'RayonController@edit')->name('rayon.edit');
  Route::PATCH('/rayon/{rayon}/edit', 'RayonController@update')->name('rayon.update');
  Route::delete('/rayon/{rayon}/delete', 'RayonController@destroy')->name('rayon.delete');

  Route::get('/rombel/cariRombel', 'RombelController@search')->name('rombel.search');
  Route::get('/rombel', 'RombelController@index')->name('rombel.index');
  Route::get('/rombel/create', 'RombelController@create')->name('rombel.create');
  Route::post('/rombel/create', 'RombelController@store')->name('rombel.store');
  Route::get('/rombel/{rombel}/edit', 'RombelController@edit')->name('rombel.edit');
  Route::PATCH('/rombel/{rombel}/edit', 'RombelController@update')->name('rombel.update');
  Route::delete('/rombel/{rombel}/delete', 'RombelController@destroy')->name('rombel.delete');

});
