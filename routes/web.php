<?php

use App\Http\Controllers\RmController;
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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

Auth::routes();

Route::middleware(['auth'])->group(function () {

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::resource('/admin/rm', RmController::class);

    Route::get('/admin/rm/upload/{rm_id}', [App\Http\Controllers\RmController::class, 'index_file']);

    Route::post('/admin/rm/upload/{rm_id}', [App\Http\Controllers\RmController::class, 'store_file']);

    Route::post('/admin/rm/delete/{rm_id}/{retensi_id}', [App\Http\Controllers\RmController::class, 'delete_file']);
});

