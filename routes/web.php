<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TugasController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [DashboardController::class, 'index']);
// Route::get('/semua_tugas', [TugasController::class, 'index']);
// Route::get('/semua_tugas/detail', [TugasController::class, 'detail']);

Route::resource('/semua_tugas', TugasController::class);