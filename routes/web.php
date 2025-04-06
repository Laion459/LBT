<?php

use App\Filament\Pages\Dashboard;
use App\Filament\Pages\Finance\ConsolidatedPanel;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\AssetController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CreditCardController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DebtController;
use App\Http\Controllers\EntityController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\FinancingController;
use App\Http\Controllers\GoalController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\RevenueController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::resource('entities', EntityController::class);
    Route::resource('transactions', TransactionController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('accounts', AccountController::class);
    Route::resource('credit_cards', CreditCardController::class);
    Route::resource('goals', GoalController::class);
    Route::resource('users', UserController::class);

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Profile routes should be inside the auth middleware group
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile/destroy', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Table Controller routes - Refatorado para usar resource
    Route::resource('table_control', TableController::class)->only(['index']); // Mostra apenas o index

    Route::resource('revenues', RevenueController::class);
    Route::resource('expenses', ExpenseController::class);
    Route::resource('assets', AssetController::class);
    Route::resource('debts', DebtController::class);
    Route::resource('financings', FinancingController::class);
    Route::resource('results', ResultController::class);

    Route::put('/revenues/{revenue}', [RevenueController::class, 'update']);
    Route::delete('/revenues/{revenue}', [RevenueController::class, 'destroy']);
    Route::post('/revenues', [RevenueController::class, 'store']);
});

require __DIR__.'/auth.php';

// Rotas do Filament (fora do middleware auth)
Route::get('/admin', function () {
    return redirect('/admin/dashboard');
});

Route::get('/admin/dashboard', [Dashboard::class, '__invoke'])->name('filament.admin.pages.dashboard');
Route::get('/admin/finance/consolidated-panel', [ConsolidatedPanel::class, '__invoke'])->name('filament.admin.pages.finance.consolidated-panel');
