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


Route::get('/trips', [TripController::class, 'index'])->name('trip.index')->middleware('auth');
Route::get('/trip/{trip}', [TripController::class, 'show'])->name('trip.show')->middleware('auth');
Route::get('/trip/{trip}/join', [TripController::class, 'joinTrip'])->name('trip.join')->middleware('auth');
Route::get('/trip', [TripController::class, 'create'])->name('trip.create')->middleware('auth');
Route::post('/trip', [TripController::class, 'store'])->name('trips.store')->middleware('auth');
Route::get('/mytrips', [TripController::class, 'indexMine'])->name('trip.mytrips')->middleware('auth');


Route::get('/friend/add/{id}',[FriendsController::class, 'add']);
Route::get('/friend/accept/{id}',[FriendsController::class, 'accept']);
Route::get('/friend/deny/{id}',[FriendsController::class, 'deny']);
Route::get('/friend/remove/{id}',[FriendsController::class, 'remove']);

Route::get('/impressum', function () {
    return view('impressum');
})->name('impressum');



Route::get('users', [FriendsController::class, 'index'])->name('user.index')->middleware('auth');

require __DIR__.'/auth.php';
