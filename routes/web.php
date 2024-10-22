<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\branchDashboard;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

   

Route::get('dashboard', [DashboardController::class, 'index'])->middleware(['admin'])->name('dashboard');

Route::get('branchDashbord', [branchDashboard::class, 'branch'])->middleware(['branch'])->name('branchDashbord');


});


require __DIR__.'/auth.php';

