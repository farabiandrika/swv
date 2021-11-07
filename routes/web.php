<?php

use Illuminate\Support\Facades\Auth;
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

Route::group(['middleware' => 'revalidate'], function()
{
    // Routes yang mau di revalidate masukan di sini
    Route::get('/', function () {
        return view('welcome');
    });
    Route::get('/tes', function () {
        return view('customer/pages/index');
    });
    Route::get('/tes-admin', function () {
        return view('admin/pages/index');
    });
    
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    
    Auth::routes();
});