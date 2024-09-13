<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DJController;
use App\Http\Controllers\FestivalController;
use App\Livewire\TourSelector;

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});




Route::get('/', [DJController::class, 'index'])->name('djs.index');
Route::get('/djs/{id}', [DJController::class, 'show'])->name('djs.show');

Route::middleware(['auth'])->group(function () {
    Route::get('/tours', [FestivalController::class, 'index'])->name('tours.index');
});

Auth::routes();



