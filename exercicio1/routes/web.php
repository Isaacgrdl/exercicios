<?php

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

Route::get('/', [UserController::class, 'index'])->name('index');
Route::post('/search', [UserController::class, 'searchByEmail'])->name('search');
Route::get('/create', [UserController::class, 'create'])->name('create');
Route::get('/edit/{id}', [UserController::class, 'edit'])->name('edit');
Route::patch('/save', [UserController::class, 'save'])->name('save');
Route::post('/create', [UserController::class, 'store'])->name('store');
Route::delete('/delete', [UserController::class, 'delete'])->name('delete');
