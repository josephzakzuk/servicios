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
	
	if(Auth::check()){
        return redirect()->route('home');
    }else{
         return view('welcome');
	}
	
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('clientes', 'ClientesController')->except(['destroy']);
Route::post('clientes/{cliente}/destroy', 'ClientesController@destroy')->name('clientes.destroy');
Route::get('clientes/{cliente}/addservice', 'ClientesController@showAddService')->name('clientes.addservice');
Route::post('clientes/addservicestore', 'ClientesController@AddService')->name('clientes.addservice.store');
Route::get('clientes/{cliente}/detalleservicios', 'ClientesController@detalleServicios')->name('clientes.detalleservicios');

Route::resource('servicios', 'ServiciosController')->except(['destroy']);
Route::post('servicios/{servicio}/destroy', 'ServiciosController@destroy')->name('servicios.destroy');

   


