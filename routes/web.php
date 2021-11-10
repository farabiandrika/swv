<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CatalogueController;
use App\Http\Controllers\CatalogueImagesController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\KaryawanManager;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
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
    Route::get('/', [PageController::class, 'index']);
    
    Route::middleware(['auth'])->group(function () {
        Route::prefix('admin')->group(function() {
            Route::get('/', [KaryawanController::class, 'index']);
            Route::get('/karyawan', [AdminController::class, 'karyawan']);
            Route::get('/transaksi', [KaryawanController::class, 'transaksi']);
            Route::get('/laporan', [AdminController::class, 'laporan']);
            Route::get('/category', [KaryawanController::class, 'category']);
            Route::get('/product', [KaryawanController::class, 'product']);
        });
     
        Route::middleware(['isCustomer'])->group(function () {
            // is Customer
        });


        Route::prefix('api')->group(function () {
            Route::resource('category', CategoryController::class);
            Route::POST('/product/{id}/update', [CatalogueController::class, 'updateV2']);
            Route::resource('product', CatalogueController::class);
            Route::resource('image', CatalogueImagesController::class);
            Route::resource('karyawan', KaryawanManager::class);

        });
    });
    Route::get('/logout', function() {
        Auth::logout();
        return redirect('/');
    });

    Auth::routes([
        'register' => true, // Registration Routes...
        'reset' => false, // Password Reset Routes...
        'verify' => false, // Email Verification Routes...
    ]);
});