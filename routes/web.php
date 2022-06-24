<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TugasController;
use App\Http\Controllers\UserController;
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

Route::get('/', [DashboardController::class, 'index'])->middleware('auth');

Route::get('/tugas/setor', [TugasController::class, 'setor_tugas'])->middleware('auth');
Route::post('/tugas/setor', [TugasController::class, 'setor']);
Route::get('/tugas/get_data_tugas', [TugasController::class, 'get_data_tugas']);
Route::resource('/tugas', TugasController::class)->middleware('auth');

Route::get('user/login', [UserController::class, 'login'])->name('login')->middleware('guest');
Route::post('user/login', [UserController::class, 'authenticated']);
Route::get('user/registrasi', [UserController::class, 'registrasi'])->middleware('guest');
Route::post('user/registrasi', [UserController::class, 'register']);
Route::get('user/logout', [UserController::class, 'logout'])->middleware('auth');
Route::get('/user', [UserController::class, 'index'])->name('user_profil')->middleware('auth');
Route::post('/user', [UserController::class, 'edit']);
Route::get('/user/{user:id}/edit', [UserController::class, 'edit_profile'])->middleware('auth');