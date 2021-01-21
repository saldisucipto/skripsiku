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

Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::match(['get', 'post'], '/slider-banner', 'SliderBannerController@index');

     // Company Info
     Route::get('/company-info', 'CompanyInfoController@index');
     Route::put('/edit-info/{id}', 'CompanyInfoController@edit');
     // End Company Infoi
});
