<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\InspectionController;
use App\Http\Controllers\SummaryController;
use App\Http\Controllers\AdminApprovalController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExpensesController;
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
    return view('auth/login');
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware(['auth'])->group(function () {
    Route::resource('inspections', InspectionController::class);
    Route::get('/summary', [SummaryController::class, 'index'])->name('summary.index');
});
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/approvals', [AdminApprovalController::class, 'index'])->name('admin_approvals.index');
    Route::patch('/admin/approvals/{id}/approve', [AdminApprovalController::class, 'approve'])->name('admin_approvals.approve');
    Route::delete('/admin/approvals/{id}/reject', [AdminApprovalController::class, 'reject'])->name('admin_approvals.reject');
});
Route::get('/expenses', [ExpensesController::class, 'index'])->name('expenses.index');

require __DIR__.'/auth.php';
