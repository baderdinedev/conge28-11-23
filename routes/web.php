<?php

use App\Http\Controllers\ResponsableController;
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
    return view('welcome');
});

Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::middleware(['auth', 'role:responsable'])->prefix('/responsable')->group(function () {
    Route::resource('roles' , \App\Http\Controllers\RoleController::class);
    Route::get('/dashboard', [ResponsableController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/Employelist', [ResponsableController::class, 'getUsers'])->name('employe.list');

});
