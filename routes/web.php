<?php

use App\Http\Controllers\Auth\EmployeeLoginController;
use App\Http\Controllers\EmployeController;
use App\Http\Controllers\LeaveRequestController;
use App\Http\Controllers\ResponsableController;
use App\Http\Controllers\RoleController;
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

Route::middleware(['guest'])->group(function () {
    Route::get('/employee/login', [EmployeeLoginController::class, 'showLoginForm'])->name('employee.login');
    Route::post('/employee/login', [EmployeeLoginController::class, 'login']);
});

Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::middleware(['auth', 'role:responsable'])->prefix('/responsable')->group(function () {
    Route::resource('roles', \App\Http\Controllers\RoleController::class);
    Route::get('/dashboard', [ResponsableController::class, 'index'])->name('dashboard');

    Route::get('/Employelist', [ResponsableController::class, 'getUsers'])->name('employe.list');
    Route::get('/EmployeCreate', [ResponsableController::class, 'create'])->name('employe.create');
    Route::post('/EmployeCreate/store', [ResponsableController::class, 'store'])->name('employe.store');
    Route::get('/EmployeShow/{id}', [ResponsableController::class, 'show'])->name('employe.show');
    Route::get('/EmployeShow/{id}/edit', [ResponsableController::class, 'edit'])->name('employe.edit');
    Route::put('/Employe/{id}', [ResponsableController::class, 'update'])->name('employe.update');
    Route::delete('/Employe/{id}', [ResponsableController::class, 'destroy'])->name('employe.destory');

    // Roles CRUD
    Route::get('/roles', [RoleController::class, 'index'])->name('roles');
    Route::get('roles/create', [RoleController::class, 'create'])->name('roles.create');
    Route::post('roles/store', [RoleController::class, 'store'])->name('roles.store');
    Route::get('/roles/{id}', [RoleController::class, 'show'])->name('roles.show');
    Route::get('/roles/{id}/edit', [RoleController::class, 'edit'])->name('roles.edit');
    Route::get('/roles/{id}', [RoleController::class, 'edit'])->name('roles.update');
    Route::delete('/roles/{id}', [RoleController::class, 'destory'])->name('roles.destroy');

    Route::get('/leaveRequest/list', [LeaveRequestController::class, 'index'])->name('leave-requests.list');
    Route::post('/leave-request/{id}/approve', [LeaveRequestController::class, 'approveLeave'])->name('leave-request.approve');
    Route::post('/leave-request/{id}/reject', [LeaveRequestController::class, 'rejectLeave'])->name('leave-request.reject');


});

Route::middleware(['auth', 'role:employe'])->prefix('/employe')->group(function () {
    Route::get('/dashboard', [EmployeController::class, 'index'])->name('dashboard');
    Route::get('/leaveRequest', [LeaveRequestController::class, 'create'])->name('leaveRequestForm');
    Route::post('/leaveRequest/store', [LeaveRequestController::class, 'store'])->name('leave-requests.store');
    Route::get('/leaveRequest/{id}', [EmployeController::class, 'show'])->name('leave-request.show');
});