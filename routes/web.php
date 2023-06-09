<?php

use App\Http\Controllers\ConfirmationController;
use App\Http\Controllers\ProfileController;
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
    return view('welcome');
});

/*Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');*/

Route::get('/dashboard', [ConfirmationController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::get('/download/{id}', [ConfirmationController::class, 'download'])
    ->middleware(['auth', 'verified'])
    ->name('download');

Route::get('/confirm/{id}', [ConfirmationController::class, 'confirm'])
    ->middleware(['auth', 'verified'])
    ->name('confirmation');

Route::get('/stats/', [ConfirmationController::class, 'confirm'])
    ->middleware(['auth', 'verified'])
    ->name('stats');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
