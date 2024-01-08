<?php

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

Route::get('/', 'App\\Http\\Controllers\\MainPageController@index') ->name('main.index');
Route::get('/calculations', 'App\\Http\\Controllers\\CalculationsController@index') -> name('calculation.index');
Route::get('/calculations/create', 'App\\Http\\Controllers\\CalculationsController@create') -> name('calculation.create');
Route::post('/calculations', 'App\\Http\\Controllers\\CalculationsController@store') -> name('calculation.store');
Route::get('/calculations/{calculation}', 'App\\Http\\Controllers\\CalculationsController@show') ->name('calculation.show');
Route::get('/calculations/{calculation}/edit', 'App\\Http\\Controllers\\CalculationsController@edit') ->name('calculation.edit');
Route::patch('/calculations/{calculation}/edit', 'App\\Http\\Controllers\\CalculationsController@update') ->name('calculation.update');
Route::delete('/calculations/{calculation}/destroy', 'App\\Http\\Controllers\\CalculationsController@destroy') -> name('calculation.destroy');


Route::get('/calculations/update', 'App\\Http\\Controllers\\Calculatons@update');
Route::get('/calculations/delete', 'App\\Http\\Controllers\\Calculatons@delete');
Route::get('/auth', 'App\\Http\\Controllers\\AuthController@index') -> name('auth.index');
Route::get('/token', function (Request $request) {
    $token = $request->session()->token();
    $token = csrf_token();
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
