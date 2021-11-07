<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\PageController;
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
        });
     
        Route::middleware(['isCustomer'])->group(function () {
            // is Customer
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