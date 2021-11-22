<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('admin/categorias', 'CategoryController')->names('categories')->except(['create', 'edit']);

Route::resource('admin/bicicletas', 'BikeController')->names('bikes')->except(['create', 'edit']);

Route::get('admin/skusCategory/{idCategory}', 'SkuController@skusForCategory');
Route::get('admin/skusAvailable/{id}', 'SkuController@available');
Route::resource('admin/skus', 'SkuController')->names('skus');

Route::get('alquiler/detalle', 'RentalController@detail')->name('rental.detail');
Route::post('alquiler/pagar', 'RentalController@pay')->name('rental.pay');
Route::post('alquiler/guardar', 'RentalController@store')->name('rental.store');

Route::get('alquiler', 'RentalPricingController@pricesView');
Route::get('alquiler/show', 'RentalPricingController@getRentalPricing');
Route::resource('admin/precios', 'RentalPricingController')->names('prices')->except(['create', 'edit']);

Route::get('admin/attributes/{idSku}', 'AttributeController@getAttributes');


// Route::get('/alquiler', '')