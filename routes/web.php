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


use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/','DashboardController');
Route::resource('/clients','ClientController');
//credit
Route::get('/credit/{client}','CreditController@create')->name('credit.create');
Route::post('/credit/{client}','CreditController@store')->name('credit.store');
Route::delete('/credit/{credit}','CreditController@destroy')->name('credit.destroy');

//profile
Route::get('/profile/{user}','UserController@edit')->name('user.edit');
Route::put('/profile/{user}','UserController@update')->name('user.update');

