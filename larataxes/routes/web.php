<?php

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

Route::get('/', function () {
    return redirect('/salaries');
});

Route::get('/salaries', [\App\Http\Controllers\SalaryController::class, 'index'])->name('salaries');
Route::get('/calculator', [\App\Http\Controllers\SalaryController::class, 'calc'])->name('calc');
Route::get('/calculator/show', [\App\Http\Controllers\SalaryController::class, 'show']);
Route::post('/calculator/show', [\App\Http\Controllers\SalaryController::class, 'store']);
