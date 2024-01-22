<?php

use App\Http\Controllers\{
    AuthController,
    CalculationsController,
    MainPageController,
    TokenController,
};
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;


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


Route::get('/', [MainPageController::class, 'index'])
    ->name('main.index');


Route::get('/calculations', [CalculationsController::class, 'index'])
    -> name('calculation.index');
Route::get('/calculations/create', [CalculationsController::class,'create'])
    -> name('calculation.create');
Route::post('/calculations', [CalculationsController::class, 'store'])
    -> name('calculation.store');
Route::get('/calculations/{calculation}', [CalculationsController::class, 'show'])
    ->name('calculation.show');
Route::get('/calculations/{calculation}/edit', [CalculationsController::class, 'edit'])
    ->name('calculation.edit');
Route::patch('/calculations/{calculation}/edit', [CalculationsController::class, 'update'])
    ->name('calculation.update');
Route::delete('/calculations/{calculation}/destroy', [CalculationsController::class, 'destroy'])
    -> name('calculation.destroy');


Route::get('/auth', [AuthController::class, 'index']) -> name('auth.index');


Route::get('/token/{request}', [TokenController::class, 'index']);



Auth::routes();
