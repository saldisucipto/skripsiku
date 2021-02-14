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

Route::get('/', 'StaticController@welcome')->name('beranda');
// register customer
Route::match(['get', 'post'], '/register-customers', 'CustomerController@index')->name('registercust');
// login customer
// Route::post('/login', 'CustomerController@login')
Route::get('/produk/{slug}', 'StaticController@produkShow');

// order
Route::match(['get', 'post'], '/orders', 'OrderController@trksiOrder')->name('transaksi.order');

// tambah keranjang
Route::post('/tambahkeranjang', 'OrderController@tambahKeranjang')->name('tambah.keranjang');
// end order


Route::prefix('customer')->group(function () {
    Route::get('/login', 'Auth\CustomerLoginController@showLoginForm')->name('customer.login');
    Route::post('/login', 'Auth\CustomerLoginController@login')->name('customer.login.submit');
    Route::post('/logout', 'Auth\CustomerLoginController@logout')->name('logout.customers');
});

Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    // Slider Start
    Route::match(['get', 'post'], '/slider-banner', 'SliderBannerController@index');
    Route::match(['get', 'put'], '/slider-edit/{id}', 'SliderBannerController@update');
    // Slider End
    // Company Info
    Route::get('/company-info', 'CompanyInfoController@index');
    Route::put('/edit-info/{id}', 'CompanyInfoController@edit');
    // End Company Info
    // Start Slider
    // parent nav
    Route::match(['get', 'post'], '/navigasi', 'NavigasiController@index');
    Route::post('/navigasi-parent', 'NavigasiController@craetaParentNav');
    Route::match(['get', 'put'], '/navigasi-parent/edit/{id}', 'NavigasiController@updateParentNav');
    // end parent nav
    // navigasi
    Route::post('/navigasi', 'NavigasiController@createNav');
    Route::match(['get', 'put'], '/navigasi/edit/{id}', 'NavigasiController@updateNav');
    // end parent navigasi
    // End Slider
    // Product
    // Kategori Produk
    Route::get('/product', 'ProductController@index');
    Route::match(['get', 'post'], '/category-product', 'ProductController@catIndex');
    Route::match(['get', 'put'], '/category-update/{id}', 'ProductController@catUpdate');
    Route::post('/search-product', 'ProductController@search');
    Route::post('/product-create', 'ProductController@productCreate');
    Route::match(['get', 'put'], '/product-update/{id}', 'ProductController@productUpdate');
    // End Product

    Route::get('/home-customers', 'CustomerController@customers');
    Route::get('/home/activecust/{id_customers}', 'CustomerController@actiavtedCust');
    Route::get('/home/deactive/{id_customers}', 'CustomerController@deacactiavtedCust');
});
