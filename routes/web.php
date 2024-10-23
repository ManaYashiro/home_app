<?php

use App\Http\Controllers\CohortController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/menu', function () {
    return view('menu');
});
Route::get('/cohort_registration', function () {
    return view('cohort_reg');
});
Route::get('/certificate_app_registration', function () {
    return view('certificate_app_reg');
});
Route::get('/applicant_page', function () {
    return view('applicant_page');
});
Route::get('/applicant_registration_page', function () {
    return view('applicant_reg_page');
});

Route::post('/cohorts', [CohortController::class, 'store'])->name('cohorts.store');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
