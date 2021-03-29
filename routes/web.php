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
Route::group(['middleware'=>['auth','admin']],function(){
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    });
    Route::get('/role-register', [App\Http\Controllers\Admin\DashboardController::class, 'registered'])->name('registered');
    Route::get('/role-edit/{id}', [App\Http\Controllers\Admin\DashboardController::class, 'registeredit'])->name('registeredit');
    Route::put('/role-register-update/{id}', [App\Http\Controllers\Admin\DashboardController::class, 'registerupdate'])->name('registerupdate');
    Route::delete('/role-delete/{id}', [App\Http\Controllers\Admin\DashboardController::class, 'registerdelete'])->name('registerdelete');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
