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
    return redirect()->route('login');
});

Route::get('/home', 'App\Http\Controllers\DashboardController')->name('dashboard');

Route::prefix('/dashboard')->group(function(){
    Route::resource('/funcionarios', \App\Http\Controllers\FuncionarioController::class);
    Route::any('/filtros', 'App\Http\Controllers\FuncionarioController@filtrar')->name('funcionarios.filtros');
});


require __DIR__.'/auth.php';
