<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FindingController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth/login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/findings', [FindingController::class, 'index'])->name('findings.index');
    Route::get('/findings/create', [FindingController::class, 'create'])->name('findings.create');
    Route::post('/findings', [FindingController::class, 'store'])->name('findings.store');
    Route::get('/findings/{finding}', [FindingController::class, 'show'])->name('findings.show');
    Route::get('/findings/{finding}/edit', [FindingController::class, 'edit'])->name('findings.edit');
    Route::put('/findings/{finding}', [FindingController::class, 'update'])->name('findings.update');
    Route::delete('/findings/{finding}', [FindingController::class, 'destroy'])->name('findings.destroy');
    Route::get('/my-findings', [FindingController::class, 'myFindings'])->name('findings.my');
    Route::get('/all-findings', [FindingController::class, 'allFindings'])->name('findings.all');
});

require __DIR__.'/auth.php';
