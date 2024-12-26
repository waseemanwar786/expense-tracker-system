<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ExcelController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [ExpenseController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {

    //Expense report
    Route::get('/expenses/report', [ExpenseController::class, 'report'])->name('expenses.report');

    //Import Excel or CSV file
    Route::get('expenses/import', [ExcelController::class, 'showImportForm'])->name('expenses.importForm');
    Route::post('expenses/import', [ExcelController::class, 'import'])->name('expenses.import');

    // export Excel or CSV file
    Route::get('/expenses/export', [ExcelController::class, 'export'])->name('expenses.export');
    
    // Expense Resource Route
    Route::resource('expenses', ExpenseController::class);

    // Category Resource Route
    Route::resource('categories', CategoryController::class);




});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
