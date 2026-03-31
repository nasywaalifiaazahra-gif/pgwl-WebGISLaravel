<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\PointsController;
use App\Http\Controllers\PolygonsController;
use App\Http\Controllers\PolylinesController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/peta', [PageController::class, 'peta'])->name('peta');

Route::get('/tabel', [PageController::class, 'tabel'])->name('tabel');

Route::post('/store-points', [PointsController::class, 'store'])->name('point.store');

Route::post('/store-polylines', [PolylinesController::class, 'store'])->name('polylines.store');

Route::post('/store-polygons', [PolygonsController::class, 'store'])->name('polygons.store');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');
