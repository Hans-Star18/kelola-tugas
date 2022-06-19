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

Route::get('/', [DashboardController::class, 'index']);

Route::get('/tugas/setor', [TugasController::class, 'setor_tugas']);
Route::post('/tugas/setor', [TugasController::class, 'setor']);
Route::get('/tugas/get_data_tugas', [TugasController::class, 'get_data_tugas']);
Route::resource('/tugas', TugasController::class);

Route::get('user/login', [UserController::class, 'login']);
Route::get('user/register', [UserController::class, 'register']);
Route::resource('/user', UserController::class);