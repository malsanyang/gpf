<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CitizenController;
use App\Http\Controllers\CourtController;
use App\Http\Controllers\CrimeController;
use App\Http\Controllers\CriminalController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PoliceStationController;
use App\Http\Controllers\PrisonController;
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
    Route::get('/', [UserController::class, 'index'])->name('users.index')->middleware('can:' . LocalPermission::CAN_VIEW_RECORD);
    Route::get('/users', [UserController::class, 'index'])->name('users.index')->middleware('can:' . LocalPermission::CAN_VIEW_RECORD);
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create')->middleware('can:' . LocalPermission::CAN_CREATE_RECORD);
    Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show')->middleware('can:' . LocalPermission::CAN_VIEW_RECORD);
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit')->middleware('can:' . LocalPermission::CAN_UPDATE_RECORD);
    Route::post('/users', [UserController::class, 'store'])->name('users.store')->middleware('can:' . LocalPermission::CAN_CREATE_RECORD);
    Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update')->middleware('can:' . LocalPermission::CAN_UPDATE_RECORD);
    Route::delete('/users/{id}', [UserController::class, 'delete'])->name('users.delete')->middleware('can:' . LocalPermission::CAN_DELETE_RECORD);
})->middleware('auth');

Route::prefix('citizens')->group(function () {
    Route::get('/', [CitizenController::class, 'index'])->name('citizens.index')->middleware('can:' . LocalPermission::CAN_VIEW_RECORD);
    Route::get('/create', [CitizenController::class, 'create'])->name('citizens.create')->middleware('can:' . LocalPermission::CAN_CREATE_RECORD);
    Route::get('/{id}', [CitizenController::class, 'show'])->name('citizens.show')->middleware('can:' . LocalPermission::CAN_VIEW_RECORD);
    Route::get('/{id}/edit', [CitizenController::class, 'edit'])->name('citizens.edit')->middleware('can:' . LocalPermission::CAN_UPDATE_RECORD);
    Route::post('/', [CitizenController::class, 'store'])->name('citizens.store')->middleware('can:' . LocalPermission::CAN_CREATE_RECORD);
    Route::put('/{id}', [CitizenController::class, 'update'])->name('citizens.update')->middleware('can:' . LocalPermission::CAN_UPDATE_RECORD);
    Route::delete('/{id}', [CitizenController::class, 'delete'])->name('citizens.delete')->middleware('can:' . LocalPermission::CAN_DELETE_RECORD);
})->middleware('auth');

Route::prefix('criminals')->group(function () {
    Route::get('/', [CriminalController::class, 'index'])->name('criminals.index')->middleware('can:' . LocalPermission::CAN_VIEW_RECORD);
    Route::get('/create', [CriminalController::class, 'create'])->name('criminals.create')->middleware('can:' . LocalPermission::CAN_CREATE_RECORD);
    Route::get('/{id}', [CriminalController::class, 'show'])->name('criminals.show')->middleware('can:' . LocalPermission::CAN_VIEW_RECORD);
    Route::get('/{id}/edit', [CriminalController::class, 'edit'])->name('criminals.edit')->middleware('can:' . LocalPermission::CAN_UPDATE_RECORD);
    Route::post('/', [CriminalController::class, 'store'])->name('criminals.store')->middleware('can:' . LocalPermission::CAN_CREATE_RECORD);
    Route::put('/{id}', [CriminalController::class, 'update'])->name('criminals.update')->middleware('can:' . LocalPermission::CAN_UPDATE_RECORD);
    Route::delete('/{id}', [CriminalController::class, 'delete'])->name('criminals.delete')->middleware('can:' . LocalPermission::CAN_DELETE_RECORD);
})->middleware('auth');

Route::prefix('courts')->group(function () {
    Route::get('/', [CourtController::class, 'index'])->name('courts.index')->middleware('can:' . LocalPermission::CAN_VIEW_RECORD);
    Route::get('/create', [CourtController::class, 'create'])->name('courts.create')->middleware('can:' . LocalPermission::CAN_CREATE_RECORD);
    Route::get('/{id}', [CourtController::class, 'show'])->name('courts.show')->middleware('can:' . LocalPermission::CAN_VIEW_RECORD);
    Route::get('/{id}/edit', [CourtController::class, 'edit'])->name('courts.edit')->middleware('can:' . LocalPermission::CAN_UPDATE_RECORD);
    Route::post('/', [CourtController::class, 'store'])->name('courts.store')->middleware('can:' . LocalPermission::CAN_CREATE_RECORD);
    Route::put('/{id}', [CourtController::class, 'update'])->name('courts.update')->middleware('can:' . LocalPermission::CAN_UPDATE_RECORD);
    Route::delete('/{id}', [CourtController::class, 'delete'])->name('courts.delete')->middleware('can:' . LocalPermission::CAN_DELETE_RECORD);
})->middleware('auth');

Route::prefix('police-stations')->group(callback: function () {
    Route::get('/', [PoliceStationController::class, 'index'])->name('police-stations.index')->middleware('can:' . LocalPermission::CAN_VIEW_RECORD);
    Route::get('/create', [PoliceStationController::class, 'create'])->name('police-stations.create')->middleware('can:' . LocalPermission::CAN_CREATE_RECORD);
    Route::get('/{id}', [PoliceStationController::class, 'show'])->name('police-stations.show')->middleware('can:' . LocalPermission::CAN_VIEW_RECORD);
    Route::get('/{id}/edit', [PoliceStationController::class, 'edit'])->name('police-stations.edit')->middleware('can:' . LocalPermission::CAN_UPDATE_RECORD);
    Route::post('/', [PoliceStationController::class, 'store'])->name('police-stations.store')->middleware('can:' . LocalPermission::CAN_CREATE_RECORD);
    Route::put('/{id}', [PoliceStationController::class, 'update'])->name('police-stations.update')->middleware('can:' . LocalPermission::CAN_UPDATE_RECORD);
    Route::delete('/{id}', [PoliceStationController::class, 'delete'])->name('police-stations.delete')->middleware('can:' . LocalPermission::CAN_DELETE_RECORD);
})->middleware('auth');

Route::prefix('prisons')->group(callback: function () {
    Route::get('/', [PrisonController::class, 'index'])->name('prisons.index')->middleware('can:' . LocalPermission::CAN_VIEW_RECORD);
    Route::get('/create', [PrisonController::class, 'create'])->name('prisons.create')->middleware('can:' . LocalPermission::CAN_CREATE_RECORD);
    Route::get('/{id}', [PrisonController::class, 'show'])->name('prisons.show')->middleware('can:' . LocalPermission::CAN_VIEW_RECORD);
    Route::get('/{id}/edit', [PrisonController::class, 'edit'])->name('prisons.edit')->middleware('can:' . LocalPermission::CAN_UPDATE_RECORD);
    Route::post('/', [PrisonController::class, 'store'])->name('prisons.store')->middleware('can:' . LocalPermission::CAN_CREATE_RECORD);
    Route::put('/{id}', [PrisonController::class, 'update'])->name('prisons.update')->middleware('can:' . LocalPermission::CAN_UPDATE_RECORD);
    Route::delete('/{id}', [PrisonController::class, 'delete'])->name('prisons.delete')->middleware('can:' . LocalPermission::CAN_DELETE_RECORD);
})->middleware('auth');

Route::prefix('crimes')->group(callback: function () {
    Route::get('/', [CrimeController::class, 'index'])->name('crimes.index')->middleware('can:' . LocalPermission::CAN_VIEW_RECORD);
    Route::get('/create', [CrimeController::class, 'create'])->name('crimes.create')->middleware('can:' . LocalPermission::CAN_CREATE_RECORD);
    Route::get('/{id}', [CrimeController::class, 'show'])->name('crimes.show')->middleware('can:' . LocalPermission::CAN_VIEW_RECORD);
    Route::get('/{id}/add-investigation-report', [CrimeController::class, 'addInvestigationReport'])->name('crimes.add_investigation_report')->middleware('can:' . LocalPermission::CAN_ADD_INVESTIGATOR_REPORT);
    Route::get('/{id}/add-prosecution-report', [CrimeController::class, 'addProsecutionReport'])->name('crimes.add_prosecution_report')->middleware('can:' . LocalPermission::CAN_ADD_PROSECUTION_REPORT);
    Route::post('/', [CrimeController::class, 'store'])->name('crimes.store')->middleware('can:' . LocalPermission::CAN_CREATE_RECORD);
    Route::put('/{id}/add-investigation-report', [CrimeController::class, 'updateInvestigationReport'])->name('crimes.update_investigation_report')->middleware('can:' . LocalPermission::CAN_ADD_INVESTIGATOR_REPORT);
    Route::put('/{id}/add-prosecution-report', [CrimeController::class, 'updateProsecutionReport'])->name('crimes.update_prosecution_report')->middleware('can:' . LocalPermission::CAN_ADD_PROSECUTION_REPORT);
    Route::delete('/{id}', [CrimeController::class, 'delete'])->name('crimes.delete')->middleware('can:' . LocalPermission::CAN_DELETE_RECORD);
})->middleware('auth');
