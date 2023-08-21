<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\WelcomeController;
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

Route::get('/', [WelcomeController::class, 'show'])->middleware('auth');

Route::get('/home', [WelcomeController::class, 'show'])->middleware('auth');

Route::prefix('auth')->group(function (){
   Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
   Route::post('authenticate', [AuthController::class, 'authenticate'])->name('auth.authenticate')->middleware('guest');
   Route::get('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');
});
