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
    return view('front.index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::post('/dataqr/store', ['uses' => 'DataqrController@store', 'as' => 'dataqr-store']);

Route::group(['prefix'=>'admin', 'middleware' => 'auth'], function() {
    Route::get('/', 'Admin\DashboardController@index');
    Route::resource('/kategori', 'Admin\KategoriController');
    Route::resource('/tugas', 'Admin\TugasController');
    Route::resource('/order_005', 'Admin\Order_005Controller');
    Route::resource('/roles', 'Admin\RoleController');
    Route::resource('/users', 'Admin\UserController');
    Route::resource('/pengunjung', 'Admin\PengunjungController');
    Route::resource('/jabatan', 'Admin\JabatanController');
    Route::resource('/pegawai', 'Admin\PegawaiController');
    Route::resource('/dataqr', 'Admin\DataqrController');
    Route::get('qrcode/{id}', 'Admin\PegawaiController@generate')->name('generate');
});

