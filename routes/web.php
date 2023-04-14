<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UploadController;
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

Route::get('/upload', [App\Http\Controllers\UploadController::class, 'index'])->name('upload');

Route::get('/edit', [App\Http\Controllers\UserController::class, 'edit'])->name('edit');

// Ruta para mostrar el formulario de subir la foto de perfil
Route::get('/profile/photo', [UploadController::class, 'create'])->middleware('auth')->name('profile.photo.create');


// Ruta para procesar la actualización de la foto de perfil
Route::put('/profile/update', [UploadController::class, 'upload'])->middleware('auth')->name('profile.update');



