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
Route::get('/dashboard/showAssets/{id}', [DashboardController::class, 'showAssets'])->name('dashboard.showAssets');

Route::get('branchDashbord', [branchDashboard::class, 'branch'])->middleware(['branch'])->name('branchDashbord');
Route::get('/branchDashbord/verify/{assetNo}', [branchDashboard::class, 'verify'])->name('branchDashbord.verify');
Route::get('/branchDashbord/showAssets/{assetNo}', [branchDashboard::class, 'showAssets'])->name('branchDashbord.showAssets');



});


require __DIR__.'/auth.php';

