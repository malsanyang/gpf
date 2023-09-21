<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Library\Auth\LocalPermission;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->middleware('auth');

Route::get('/home', [HomeController::class, 'index'])->middleware('auth');

Route::prefix('auth')->group(function (){
   Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
   Route::post('/authenticate', [AuthController::class, 'authenticate'])->name('auth.authenticate')->middleware('guest');
   Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');
});

Route::prefix('user-management')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('users.index')->middleware('can:' . LocalPermission::CAN_CREATE_USERS);
    Route::get('/users', [UserController::class, 'index'])->name('users.index')->middleware('can:' . LocalPermission::CAN_CREATE_USERS);
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create')->middleware('can:' . LocalPermission::CAN_CREATE_USERS);
    Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show')->middleware('can:' . LocalPermission::CAN_CREATE_USERS);
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit')->middleware('can:' . LocalPermission::CAN_UPDATE_USERS);
    Route::post('/users', [UserController::class, 'store'])->name('users.store')->middleware('can:' . LocalPermission::CAN_CREATE_USERS);
    Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update')->middleware('can:' . LocalPermission::CAN_UPDATE_USERS);
    Route::delete('/users/{id}', [UserController::class, 'delete'])->name('users.delete')->middleware('can:' . LocalPermission::CAN_DELETE_USERS);
})->middleware('auth');
