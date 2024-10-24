<?php

use App\Http\Controllers\ApplicantsController;
use App\Http\Controllers\ApplicantsRegstrationController;
use App\Http\Controllers\CohortController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ResidencyCertificateAppController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group(['prefix' => LaravelLocalization::setLocale()], function () {

    Route::get('/', function () {
        return view('welcome');
    });
    Route::get('/menu', function () {
        return view('menu');
    });
    Route::get('/cohort_registration', function () {
        return view('cohort_reg');
    });
    Route::get('/applicant_registration_page', function () {
        return view('applicant_reg_page');
    });

    Route::post('/cohorts', [CohortController::class, 'store'])->name('cohorts.store');
    Route::post('/residency_certificate_applicants', [ResidencyCertificateAppController::class, 'store'])->name('residencyCertificateApplicants.store');
    Route::get('/certificate_app_registration', [ResidencyCertificateAppController::class, 'index'])->name('residencyCertificateApplicants.index');
    Route::get('/applicant_page', [ApplicantsController::class, 'index'])->name('applicantPage.index');
    Route::get('/applicant_registration_page/{id}', [ApplicantsRegstrationController::class, 'index'])->name('applicant.registration');


    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');

    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

    // Locale 切り替え
    Route::get('/locale/{locale}', function ($locale) {
        if (in_array($locale, ['ja', 'en'])) {
            App::setLocale($locale);


            $segments = str_replace(url('/'), '', url()->previous());
            $segments = array_filter(explode('/', $segments));
            if (!in_array($segments[1], ['ja', 'en'])) {
                array_unshift($segments, 'ja');
            }

            array_shift($segments);
            array_unshift($segments, $locale);

            return redirect()->to(implode('/', $segments));
        }
        return redirect()->back();
    })->name('locale.switch');

    require __DIR__ . '/auth.php';
});
