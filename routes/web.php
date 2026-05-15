<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DriverController;

Route::get('/', function () {
    return view('home');
});

// Route::get('/drivers', function () {
//     return view('pages.drivers');
// })->name('drivers');

Route::get('/masters', function () {
    return view('pages.masters');
})->name('masters');

Route::get('/toda', function () {
    return view('pages.toda');
})->name('toda');

Route::get('/citations', function () {
    return view('pages.citations');
})->name('citations');

Route::get('/reports', function () {
    return view('pages.reports');
})->name('reports');

Route::get('/system', function () {
    return view('pages.system');
})->name('system');
// drivers module
Route::get('/drivers', [DriverController::class, 'index'])->name('drivers.index');
Route::post('/drivers/store', [DriverController::class, 'store'])->name('drivers.store');