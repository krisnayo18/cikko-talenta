<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\PerawatController;

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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/', [DashboardController::class, 'index']);
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('dokters', DokterController::class);
    Route::resource('perawats', PerawatController::class);

    
    // Route::get('/perawat', App\Livewire\Perawat::class)->name('perawat.index');
    // Route::get('/perawat/{id}', App\Livewire\Perawat::class)->name('perawat.show');
    // Route::view('/dashboard', 'livewire.dashboard.index')->name('dashboard');
    // Route::view('/', 'dashboard.index');
});

Route::get('/error', function () {
    abort(500);
});

require __DIR__.'/auth.php';
