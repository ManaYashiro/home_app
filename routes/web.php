<?php

use App\Http\Controllers\ApplicantsController;
use App\Http\Controllers\ApplicantsRegistrationController;
use App\Http\Controllers\CohortController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ResidencyCertificateAppController;
use App\Http\Controllers\CertificateAppRegistrationController;
use App\Http\Controllers\DownLoadController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::middleware('auth')->group(function () {
    Route::group(['prefix' => LaravelLocalization::setLocale()], function () {
        Route::get('/cohort_registration', [CohortController::class, 'index'])->name('cohorts.index');
        Route::get('/cohorts/details/{cohortName}', [CohortController::class, 'getCohortDetails']);
        Route::post('/cohorts', [CohortController::class, 'store'])->name('cohorts.store');
        Route::delete('/cohorts', [CohortController::class, 'destroy'])->name('cohorts.destroy');
        Route::post('/residency_certificate_applicants', [ResidencyCertificateAppController::class, 'store'])->name('residencyCertificateApplicants.store');
        Route::get('/certificate_app_registration', [ResidencyCertificateAppController::class, 'index'])->name('residencyCertificateApplicants.index');
        Route::get('/applicant_page', [ApplicantsController::class, 'index'])->name('applicantPage.index');
        Route::get('/applicant_registration_page/{id}', [ApplicantsRegistrationController::class, 'index'])->name('applicant.registration');
        Route::post('/applicant_registration_page/{id}', [ApplicantsRegistrationController::class, 'store'])->name('applicants.store');
        Route::get('/search', [CertificateAppRegistrationController::class, 'search']); // 検索
        Route::get('/search_user', [CertificateAppRegistrationController::class, 'cohortSelect']); // 期選択
        Route::get('/select_user', [CertificateAppRegistrationController::class, 'userSelect']); // ユーザー選択
        Route::delete('/certificate', [ResidencyCertificateAppController::class, 'destroy'])->name('certificate.destroy');
        Route::post('/download', [DownLoadController::class, 'download'])->name('file.download');
        Route::get('/menu', function () {
            return view('menu');
        })->middleware(['auth'])->name('menu');

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
    });
});

Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('menu');
    }
    return view('auth.login');
});
require __DIR__ . '/auth.php';
