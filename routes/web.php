<?php

use Illuminate\Support\Facades\Auth;

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


Route::get('/', 'HomeController@index')->name('home');

Route::get('/auth/login', function(){
  cas()->authenticate();
});

Route::get('/auth/logout', [
  'middleware' => 'cas.auth',
  function(){
    Auth::logout();
    cas()->logout();
  }
])->name('Cas.logout');


Route::get('ListofPharmaceuticalProducts/', 'ListofPharmaceuticalProductsController@home')
  ->name('ListofPharmaceuticalProducts.home');

Route::post('ListofPharmaceuticalProducts/GetMedicalList', 'ListofPharmaceuticalProductsController@getMedicalList')
  ->name('ListofPharmaceuticalProducts.GetMedicalList');

Route::post('ListofPharmaceuticalProducts/GetMedicalListDoctor', 'ListofPharmaceuticalProductsController@getMedicalListDoctor')
  ->name('ListofPharmaceuticalProducts.GetMedicalListDoctor');

Route::post('ListofPharmaceuticalProducts/UpdateMedicalList', 'ListofPharmaceuticalProductsController@UpdateMedicalList')
  ->name('ListofPharmaceuticalProducts.UpdateMedicalList');

Route::post('ListofPharmaceuticalProducts/CreateMedicalList', 'ListofPharmaceuticalProductsController@CreateMedicalList')
  ->name('ListofPharmaceuticalProducts.CreateMedicalList');
Auth::routes();


