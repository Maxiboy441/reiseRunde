<?php

use App\Http\Controllers\FriendsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TripController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('trips', [TripController::class, 'index'])->name('trip.index')->middleware('auth');
Route::get('trip/{trip}', [TripController::class, 'show'])->name('trip.show')->middleware('auth');
Route::get('trip', [TripController::class, 'create'])->name('trip.create')->middleware('auth');


Route::get('users', [FriendsController::class, 'index'])->name('user.index')->middleware('auth');

require __DIR__.'/auth.php';
