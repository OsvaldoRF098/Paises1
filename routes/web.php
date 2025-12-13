<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CountryController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return redirect()->route('countries.index');
})->middleware(['auth', 'verified'])->name('dashboard');

 // TODAS las rutas de countries DENTRO de auth
Route::middleware(['auth'])->group(function () {
    Route::get('/countries', [CountryController::class, 'index'])->name('countries.index');
    Route::post('/countries/sync', [CountryController::class, 'sync'])->name('countries.sync');
    Route::get('/countries/pdf-list', [CountryController::class, 'pdfList'])->name('countries.pdfList');
    Route::get('/countries/{country}/pdf', [CountryController::class, 'pdf'])->name('countries.pdf');
    Route::get('/countries/{country}', [CountryController::class, 'show'])->name('countries.show');
});