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
    return view('index');
});


Route::resource('/santri', 'ponpes\santri\SantriController');
Route::resource('/kamar', 'ponpes\kamar\KamarController');
Route::resource('/pengurus', 'ponpes\pengurus\PengurusController');
Route::resource('/pekerjaan', 'ponpes\pekerjaan\PekerjaanController');
Route::resource('/pengajar', 'tpq\pengajar\PengajarController');
