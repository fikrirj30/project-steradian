<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\OrderController;


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

Route::get('/', function () {
    return view('welcome');
});

Route::group([
    'prefix' => 'car'
], function() {
    Route::get('', [CarController::class, 'index'])->name('index');
    Route::post('', [CarController::class, 'store'])->name('store');
    Route::post('{id}', [CarController::class, 'update'])->name('update');
    Route::delete('{id}', [CarController::class, 'destroy'])->name('delete');

});

Route::group([
    'prefix' => 'order'
], function() {
    Route::get('', [OrderController::class, 'index'])->name('index');
    Route::post('', [OrderController::class, 'store'])->name('store');
    Route::post('{id}', [OrderController::class, 'update'])->name('update');
    Route::delete('{id}', [OrderController::class, 'destroy'])->name('delete');

});
