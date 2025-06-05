<?php

use App\Http\Controllers\Admin\AdminClientController;
use App\Http\Controllers\Admin\AdminDomainNameController;
use App\Http\Controllers\Admin\Billing\AdminInvoiceController;
use App\Http\Controllers\Admin\Billing\AdminTransactionController;
use App\Http\Controllers\Admin\Settings\GeneralSettingsController;
use App\Http\Controllers\Admin\Settings\MainSettingController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//Super Admin & Admin Routes
Route::middleware(['auth', 'role:super admin|admin'])->name('admin.')->prefix('admin')->group(function () {
    Route::get('dashboard', [App\Http\Controllers\Admin\AdminDashboardController::class,'index'])->name('dashboard');

    //Billing
    Route::name('billing.')->prefix('billing')->group(function () {

        //Invoices
        Route::name('invoices.')->prefix('invoices')->group(function(){
            Route::get('/', [AdminInvoiceController::class,'index'])->name('index');
            Route::get('/create', [AdminInvoiceController::class,'create'])->name('create');

            Route::get('/draft-invoices', [AdminInvoiceController::class, 'draftInvoices'])->name('draft-invoices');
            Route::get('/unpaid-invoices', [AdminInvoiceController::class, 'unpaidInvoices'])->name('unpaid-invoices');
            Route::get('/overdue-invoices', [AdminInvoiceController::class, 'overdueInvoices'])->name('overdue-invoices');
            Route::get('/cancelled-invoices', [AdminInvoiceController::class, 'cancelledInvoices'])->name('cancelled-invoices');
            Route::get('/refunded-invoices', [AdminInvoiceController::class, 'refundedInvoices'])->name('refunded-invoices');
            Route::get('/collections-invoices', [AdminInvoiceController::class, 'collectionsInvoices'])->name('collections-invoices');

        });

        //Transactions
        Route::resource('transactions', AdminTransactionController::class);
    });

    //Clients
    Route::name('clients.')->prefix('clients')->group(function () {
        Route::get('/', [AdminClientController::class, 'index'])->name('index');
        Route::get('/create', [AdminClientController::class, 'create'])->name('create');
        Route::post('/store', [AdminClientController::class, 'store'])->name('store');
    });

    //Domain Names
    Route::name('domain-names.')->prefix('domain-names')->group(function(){
        Route::get('/', [AdminDomainNameController::class, 'index'])->name('index');
        Route::get('create', [AdminDomainNameController::class, 'create'])->name('create');
    });

    //Settings
    Route::name('settings.')->prefix('settings')->group(function () {
        Route::get('/', [MainSettingController::class, 'index'])->name('index');

        //General Settings
        Route::name('general-settings.')->prefix('general-settings')->group(function () {
           Route::get('/', [GeneralSettingsController::class, 'index'])->name('index');

        });
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
