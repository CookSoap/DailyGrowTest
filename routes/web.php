<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\SendingController;
use App\Http\Controllers\StatisticsController;
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

Route::get('/', function () {
    return redirect('/clients');
});

Route::name('client.')->group(function () {
    Route::get('/clients', [ClientController::class, 'index'])->name('all');
    Route::get('/clients/create', [ClientController::class, 'create'])->name('create');
    Route::post('/clients/save', [ClientController::class, 'save'])->name('save');
});

Route::name('sending.')->group(function () {
    Route::get('/sending/create', [SendingController::class, 'create'])->name('create');
    Route::post('/sending/save', [SendingController::class, 'save'])->name('save');
});

Route::name('statistics.')->group(function () {
    Route::get('/statistics', [statisticsController::class, 'index'])->name('index');
});
