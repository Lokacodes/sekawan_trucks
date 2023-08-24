<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\KendaraanController;
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

Route::get('/', function () {
    return view('layouts.home');
});

Route::get('/trucks', [KendaraanController::class, 'index'])->name('trucks');
Route::post('/trucks/create', [KendaraanController::class, 'store']);
Route::get('/trucks/update/{id}', [KendaraanController::class, 'update']);

Route::get('/requests', function () {
    return view('layouts.requests');
});
