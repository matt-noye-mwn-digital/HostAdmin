<?php

use App\Http\Controllers\Admin\AdminClientController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//Super Admin & Admin Routes
Route::middleware(['auth', 'role:super admin|admin'])->name('admin.')->prefix('admin')->group(function () {
    Route::get('dashboard', [App\Http\Controllers\Admin\AdminDashboardController::class,'index'])->name('dashboard');

    //Clients
    Route::name('clients.')->prefix('clients')->group(function () {
        Route::get('/', [AdminClientController::class, 'index'])->name('index');
        Route::get('/create', [AdminClientController::class, 'create'])->name('create');
        Route::post('/store', [AdminClientController::class, 'store'])->name('store');
    });
});
//Staff Routes
Route::middleware(['auth', 'role:staff'])->name('staff.')->prefix('staff')->group(function () {
    Route::get('dashboard', [App\Http\Controllers\Staff\StaffDashboardController::class,'index'])->name('dashboard');
});


//Client Routes
Route::middleware(['auth', 'role:client'])->name('client.')->prefix('client')->group(function () {
    Route::get('dashboard', [App\Http\Controllers\Client\ClientDashboardController::class,'index'])->name('dashboard');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
