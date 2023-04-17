<?php

use App\Http\Controllers\BeatController;
use App\Http\Controllers\HomeController;
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

Route::get('/', [\App\Http\Controllers\IndexController::class, 'view']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('logout', [UserController::class, 'logout'])->name('logout');

Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'profile'])->name('profile');

Route::get('/edit', [App\Http\Controllers\UserController::class, 'edit'])->name('edit');

Route::post('/update_profile/{id}', [HomeController::class, 'update_profile'])->name('update_profile');

Route::GET('/upload_beat', [UserController::class, 'upload_beat'])->name('upload_beat');

Route::post('/add_beat', [BeatController::class, 'add_beat'])->name('add_beat');

