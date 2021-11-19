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
Route::resource('admin/bicicletas', 'BikeController')->names('bikes');
Route::resource('admin/skus', 'SkuController')->names('skus');
Route::resource('admin/precios', 'RentalPricing')->names('prices');


// Route::get('/alquiler', '')