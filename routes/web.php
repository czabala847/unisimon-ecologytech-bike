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
    return view('welcome'); //Publica
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('can:home'); //compartida

Route::resource('admin/categorias', 'CategoryController')->names('categories')->except(['create', 'edit'])->middleware('can:categories.index'); //admin

Route::resource('admin/bicicletas', 'BikeController')->names('bikes')->except(['create', 'edit'])->middleware('can:categories.index'); //admin

Route::get('admin/skusCategory/{idCategory}', 'SkuController@skusForCategory'); //publica
Route::get('admin/skusAvailable/{id}', 'SkuController@available'); //publica
Route::resource('admin/skus', 'SkuController')->names('skus')->middleware('can:categories.index'); //admin

Route::get('alquiler/detallePDF/{id}', 'RentalController@rentalPDF')->name('rental.detailPdf'); //compartida **
Route::get('alquiler/detalle', 'RentalController@detail')->name('rental.detail'); //compartida **
Route::post('alquiler/pagar', 'RentalController@pay')->name('rental.pay'); //compartida
Route::post('alquiler/guardar', 'RentalController@store')->name('rental.store'); //compartida

Route::get('alquiler', 'RentalPricingController@pricesView'); //Publica
Route::get('alquiler/show', 'RentalPricingController@getRentalPricing'); //Publica
Route::resource('admin/precios', 'RentalPricingController')->names('prices')->except(['create', 'edit']); //admin

Route::get('admin/attributes/{idSku}', 'AttributeController@getAttributes'); //Publica

Route::resource('admin/usuarios', 'userController')->names('users')->only(['index', 'edit', 'update'])->middleware('can:users.index'); //admin
// Route::get('/alquiler', '')