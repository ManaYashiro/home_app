<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight font-color-r">
            {{ __('Applicant Registration Page') }}
        </h2>
        @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
            <a href="{{ route('locale.switch', ['locale' => $localeCode]) }}"
                class="font-color-g">{{ $properties['native'] }}</a>
            @if (!$loop->last)
                <span class="mx-5">|</span>
            @endif
        @endforeach
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
                <div id="success-message" class="bg-color-g text-white py-2 px-4 rounded-md mb-4">
                    {{ session('success') }}
                </div>
            @endif
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="py-12">
                        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                                <div class="p-6 text-gray-900 grid grid-cols-2 gap-4">
                                    <!-- 左ブロック -->
                                    <div class="flex flex-col">
                                        <div class="mb-4">
                                            <label class="w-32 inline-block">{{ __('applicant_reg_page.name') }}</label>
                                            <x-data-display :value="$residentApplicant->name ?? ''" />
                                        </div>

                                        <div class="mb-4">
                                            <label
                                                class="w-32 inline-block">{{ __('applicant_reg_page.user_name') }}</label>
                                            <x-data-display :value="$residentApplicant->username ?? ''" />
                                        </div>

                                        <div class="mb-4">
                                            <label
                                                class="w-32 inline-block">{{ __('applicant_reg_page.mail_address') }}</label>
                                            <x-data-display :value="$residentApplicant->email ?? ''" />
                                        </div>

                                        <div class="mb-4">
                                            <label
                                                class="w-32 inline-block">{{ __('applicant_reg_page.country') }}</label>
                                            <x-data-display :value="$residentApplicant->country ?? ''" />
                                        </div>

                                        <div class="mb-4">
                                            <label class="w-32 inline-block">{{ __('applicant_reg_page.age') }}</label>
                                            <x-data-display :value="$residentApplicant->age ?? ''" />
                                        </div>

                                        <div class="mb-4">
                                            <label
                                                class="w-32 inline-block">{{ __('applicant_reg_page.jpn_lang_proficiency') }}</label>
                                            <x-data-display :value="$residentApplicant->japanese_level ?? ''" />
                                        </div>
                                    </div>

                                    <!-- 右ブロック -->
                                    <div class="flex flex-col">
                                        <div class="mb-4">
                                            <label
                                                class="w-32 inline-block">{{ __('applicant_reg_page.kana') }}</label>
                                            <x-data-display :value="$residentApplicant->name_kana ?? ''" />
                                        </div>

                                        <div class="mb-4">
                                            <label
                                                class="w-32 inline-block">{{ __('applicant_reg_page.password') }}</label>
                                            <x-data-display :value="$residentApplicant->password ?? ''" />
                                        </div>

                                        <div class="mb-4">
                                            <label
                                                class="w-32 inline-block">{{ __('applicant_reg_page.language') }}</label>
                                            <x-data-display :value="$residentApplicant->language ?? ''" />
                                        </div>

                                        <div class="mb-4">
                                            <label
                                                class="w-32 inline-block">{{ __('applicant_reg_page.gender') }}</label>
                                            <x-data-display :value="$residentApplicant->gender ?? ''" />
                                        </div>

                                        <div class="mb-4">
                                            <label
                                                class="w-32 inline-block">{{ __('applicant_reg_page.live_lesson_class') }}</label>
                                            <x-data-display :value="$residentApplicant->live_class_lesson ?? ''" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <form method="POST" action="{{ route('applicants.store', $id) }}" enctype="multipart/form-data">
                        @csrf
                        <!-- 在留資格認定証明書交付申請書類関係 -->
                        <div class="mt-8">
                            <h2 class="text-lg font-semibold font-color-y">
                                {{ __('applicant_reg_page.COE_application_documents') }}</h2>
                            <div class="flex mt-4">
                                <!-- 左ブロック -->
                                <div class="w-1/2 pr-2 flex flex-col justify-between">
                                    <div class="mb-4">
                                        <label
                                            for="residency_certificate_application">{{ __('applicant_reg_page.residency_certificate_application') }}</label>
                                    </div>
                                    <div class="mb-4">
                                        <label for="proof_photo">{{ __('applicant_reg_page.proof_photo') }}</label>
                                    </div>
                                    <div class="mb-4">
                                        <label
                                            for="application_form">{{ __('applicant_reg_page.application_form') }}</label>
                                    </div>
                                    <div class="mb-4">
                                        <label for="passport">{{ __('applicant_reg_page.passport') }}</label>
                                    </div>
                                    <div class="mb-4">
                                        <label
                                            for="university_graduation_certificate">{{ __('applicant_reg_page.university_graduation_certificate') }}</label>
                                    </div>
                                    <div class="mb-4">
                                        <label
                                            for="university_credits">{{ __('applicant_reg_page.university_credits') }}</label>
                                    </div>
                                    <div class="mb-4">
                                        <label
                                            for="previous_enrollment_certificate">{{ __('applicant_reg_page.previous_enrollment_certificate') }}</label>
                                    </div>
                                </div>
                                <!-- 右ブロック -->
                                <div class="w-1/2 pl-2 flex flex-col justify-between">
                                    <div class="mb-4 flex justify-between items-center">
                                        <x-input-file id="residency_certificate_application"
                                            name="residency_certificate_application" class="flex-1" />
                                        @if (isset($residentApplicant) && $residentApplicant->residency_certificate_application)
                                            @php
                                                $fileName = $residentApplicant->residency_certificate_application;
                                                $fileName = \App\Helpers\CustomHelper::trimFilename($fileName, $upload);
                                            @endphp
                                            <label class="font-size8">{{ $fileName }}</label>
                                        @endif
                                        <div class="flex items-center ml-2">
                                            <a href="#" id="residency_certificate_application_download"
                                                class="text-gray-200 hover:text-gray-500" title="Download">
                                                <i class="fas fa-download"></i>
                                            </a> <a href="#" id="residency_certificate_application_resetFile"
                                                class="ml-2 text-gray-200 hover:text-gray-500" title="Delete">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="mb-4 flex justify-between items-center">
                                        <x-input-file id="proof_photo" name="proof_photo" class="flex-1" />
                                        @if (isset($residentApplicant) && $residentApplicant->proof_photo)
                                            @php
                                                $fileName = $residentApplicant->proof_photo;
                                                $fileName = \App\Helpers\CustomHelper::trimFilename($fileName, $upload);
                                            @endphp
                                            <label class="font-size8">{{ $fileName }}</label>
                                        @endif
                                        <div class="flex items-center ml-2">
                                            <a href="#" id="proof_photo_download"
                                                class="text-gray-200 hover:text-gray-500" title="Download">
                                                <i class="fas fa-download"></i>
                                            </a>
                                            <a href="#" id="proof_photo_resetFile"
                                                class="ml-2 text-gray-200 hover:text-gray-500" title="Delete">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="mb-4 flex justify-between items-center">
                                        <x-input-file id="application_form" name="application_form" class="flex-1" />
                                        @if (isset($residentApplicant) && $residentApplicant->application_form)
                                            @php
                                                $fileName = $residentApplicant->application_form;
                                                $fileName = \App\Helpers\CustomHelper::trimFilename($fileName, $upload);
                                            @endphp
                                            <label class="font-size8">{{ $fileName }}</label>
                                        @endif
                                        <div class="flex items-center ml-2">
                                            <a href="#" id="application_form_download"
                                                class="text-gray-200 hover:text-gray-500" title="Download">
                                                <i class="fas fa-download"></i>
                                            </a>
                                            <a href="#" id="application_form_resetFile"
                                                class="ml-2 text-gray-200 hover:text-gray-500" title="Delete">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="mb-4 flex justify-between items-center">
                                        <x-input-file id="passport" name="passport" class="flex-1" />
                                        @if (isset($residentApplicant) && $residentApplicant->passport)
                                            @php
                                                $fileName = $residentApplicant->passport;
                                                $fileName = \App\Helpers\CustomHelper::trimFilename($fileName, $upload);
                                            @endphp
                                            <label class="font-size8">{{ $fileName }}</label>
                                        @endif
                                        <div class="flex items-center ml-2">
                                            <a href="#" id="passport_download"
                                                class="text-gray-200 hover:text-gray-500" title="Download">
                                                <i class="fas fa-download"></i>
                                            </a>
                                            <a href="#" id="passport_resetFile"
                                                class="ml-2 text-gray-200 hover:text-gray-500" title="Delete">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="mb-4 flex justify-between items-center">
                                        <x-input-file id="university_graduation_certificate"
                                            name="university_graduation_certificate" class="flex-1" />
                                        @if (isset($residentApplicant) && $residentApplicant->university_graduation_certificate)
                                            @php
                                                $fileName = $residentApplicant->university_graduation_certificate;
                                                $fileName = \App\Helpers\CustomHelper::trimFilename($fileName, $upload);
                                            @endphp
                                            <label class="font-size8">{{ $fileName }}</label>
                                        @endif
                                        <div class="flex items-center ml-2">
                                            <a href="#" id="university_graduation_certificate_download"
                                                class="text-gray-200 hover:text-gray-500" title="Download">
                                                <i class="fas fa-download"></i>
                                            </a>
                                            <a href="#" id="university_graduation_certificate_resetFile"
                                                class="ml-2 text-gray-200 hover:text-gray-500" title="Delete">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="mb-4 flex justify-between items-center">
                                        <x-input-file id="university_credits" name="university_credits"
                                            class="flex-1" />
                                        @if (isset($residentApplicant) && $residentApplicant->university_credits)
                                            @php
                                                $fileName = $residentApplicant->university_credits;
                                                $fileName = \App\Helpers\CustomHelper::trimFilename($fileName, $upload);
                                            @endphp
                                            <label class="font-size8">{{ $fileName }}</label>
                                        @endif
                                        <div class="flex items-center ml-2">
                                            <a href="#" id="university_credits_download"
                                                class="text-gray-200 hover:text-gray-500" title="Download">
                                                <i class="fas fa-download"></i>
                                            </a>
                                            <a href="#" id="university_credits_resetFile"
                                                class="ml-2 text-gray-200 hover:text-gray-500" title="Delete">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="mb-4 flex justify-between items-center">
                                        <x-input-file id="previous_enrollment_certificate"
                                            name="previous_enrollment_certificate" class="flex-1" />
                                        @if (isset($residentApplicant) && $residentApplicant->previous_enrollment_certificate)
                                            @php
                                                $fileName = $residentApplicant->previous_enrollment_certificate;
                                                $fileName = \App\Helpers\CustomHelper::trimFilename($fileName, $upload);
                                            @endphp
                                            <label class="font-size8">{{ $fileName }}</label>
                                        @endif
                                        <div class="flex items-center ml-2">
                                            <a href="#" id="previous_enrollment_certificate_download"
                                                class="text-gray-200 hover:text-gray-500" title="Download">
                                                <i class="fas fa-download"></i>
                                            </a>
                                            <a href="#" id="previous_enrollment_certificate_resetFile"
                                                class="ml-2 text-gray-200 hover:text-gray-500" title="Delete">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- ビザ申請書類関係 -->
                        <div class="mt-8">
                            <h2 class="text-lg font-semibold font-color-y">
                                {{ __('applicant_reg_page.visa_application_related_documents') }}</h2>
                            <div class="flex mt-4">
                                <!-- 左ブロック -->
                                <div class="w-1/2 pr-2 flex flex-col justify-between">
                                    <div class="mb-4">
                                        <label
                                            for="residency_certificate">{{ __('applicant_reg_page.residency_certificate') }}</label>
                                    </div>
                                    <div class="mb-4">
                                        <label
                                            for="practical_training_notification">{{ __('applicant_reg_page.practical_training_notification') }}</label>
                                    </div>
                                </div>
                                <!-- 右ブロック -->
                                <div class="w-1/2 pl-2 flex flex-col justify-between">
                                    <div class="mb-4 flex justify-between items-center">
                                        <x-input-file id="residency_certificate" name="residency_certificate"
                                            class="flex-1" />
                                        @if (isset($residentApplicant) && $residentApplicant->residency_certificate)
                                            @php
                                                $fileName = $residentApplicant->residency_certificate;
                                                $fileName = \App\Helpers\CustomHelper::trimFilename($fileName, $upload);
                                            @endphp
                                            <label class="font-size8">{{ $fileName }}</label>
                                        @endif
                                        <div class="flex items-center ml-2">
                                            <a href="#" id="residency_certificate_download"
                                                class="text-gray-200 hover:text-gray-500" title="Download">
                                                <i class="fas fa-download"></i>
                                            </a>
                                            <a href="#" id="residency_certificate_resetFile"
                                                class="ml-2 text-gray-200 hover:text-gray-500" title="Delete">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="mb-4 flex justify-between items-center">
                                        <x-input-file id="practical_training_notification"
                                            name="practical_training_notification" class="flex-1" />
                                        @if (isset($residentApplicant) && $residentApplicant->practical_training_notification)
                                            @php
                                                $fileName = $residentApplicant->practical_training_notification;
                                                $fileName = \App\Helpers\CustomHelper::trimFilename($fileName, $upload);
                                            @endphp
                                            <label class="font-size8">{{ $fileName }}</label>
                                        @endif
                                        <div class="flex items-center ml-2">
                                            <a href="#" id="practical_training_notification_download"
                                                class="text-gray-200 hover:text-gray-500" title="Download">
                                                <i class="fas fa-download"></i>
                                            </a>
                                            <a href="#" id="practical_training_notification_resetFile"
                                                class="ml-2 text-gray-200 hover:text-gray-500" title="Delete">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- 入国後書類関係 -->
                        <div class="mt-8">
                            <h2 class="text-lg font-semibold font-color-y">
                                {{ __('applicant_reg_page.post_entry_documentation') }}</h2>
                            <div class="flex mt-4">
                                <!-- 左ブロック -->
                                <div class="w-1/2 pr-2 flex flex-col justify-between">
                                    <div class="mb-4">
                                        <label
                                            for="residency_card">{{ __('applicant_reg_page.residency_card') }}</label>
                                    </div>
                                    <div class="mb-4">
                                        <label
                                            for="resident_certificate">{{ __('applicant_reg_page.resident_certificate') }}</label>
                                    </div>
                                    <div class="mb-4">
                                        <label
                                            for="national_health_insurance">{{ __('applicant_reg_page.national_health_insurance') }}</label>
                                    </div>
                                    <div class="mb-4">
                                        <label for="pension_book">{{ __('applicant_reg_page.pension_book') }}</label>
                                    </div>
                                    <div class="mb-4">
                                        <label for="bank_book">{{ __('applicant_reg_page.bank_book') }}</label>
                                    </div>
                                    <div class="mb-4">
                                        <label
                                            for="my_number_card">{{ __('applicant_reg_page.my_number_card') }}</label>
                                    </div>
                                </div>
                                <!-- 右ブロック -->
                                <div class="w-1/2 pl-2 flex flex-col justify-between">
                                    <div class="mb-4 flex justify-between items-center">
                                        <x-input-file id="residency_card" name="residency_card" class="flex-1" />
                                        @if (isset($residentApplicant) && $residentApplicant->residency_card)
                                            @php
                                                $fileName = $residentApplicant->residency_card;
                                                $fileName = \App\Helpers\CustomHelper::trimFilename($fileName, $upload);
                                            @endphp
                                            <label class="font-size8">{{ $fileName }}</label>
                                        @endif
                                        <div class="flex items-center ml-2">
                                            <a href="#" id="residency_card_download"
                                                class="text-gray-200 hover:text-gray-500" title="Download">
                                                <i class="fas fa-download"></i>
                                            </a>
                                            <a href="#" id="residency_card_resetFile"
                                                class="ml-2 text-gray-200 hover:text-gray-500" title="Delete">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="mb-4 flex justify-between items-center">
                                        <x-input-file id="resident_certificate" name="resident_certificate"
                                            class="flex-1" />
                                        @if (isset($residentApplicant) && $residentApplicant->resident_certificate)
                                            @php
                                                $fileName = $residentApplicant->resident_certificate;
                                                $fileName = \App\Helpers\CustomHelper::trimFilename($fileName, $upload);
                                            @endphp
                                            <label class="font-size8">{{ $fileName }}</label>
                                        @endif
                                        <div class="flex items-center ml-2">
                                            <a href="#" id="resident_certificate_download"
                                                class="text-gray-200 hover:text-gray-500" title="Download">
                                                <i class="fas fa-download"></i>
                                            </a>
                                            <a href="#" id="resident_certificate_resetFile"
                                                class="ml-2 text-gray-200 hover:text-gray-500" title="Delete">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="mb-4 flex justify-between items-center">
                                        <x-input-file id="national_health_insurance" name="national_health_insurance"
                                            class="flex-1" />
                                        @if (isset($residentApplicant) && $residentApplicant->national_health_insurance)
                                            @php
                                                $fileName = $residentApplicant->national_health_insurance;
                                                $fileName = \App\Helpers\CustomHelper::trimFilename($fileName, $upload);
                                            @endphp
                                            <label class="font-size8">{{ $fileName }}</label>
                                        @endif
                                        <div class="flex items-center ml-2">
                                            <a href="#" id="national_health_insurance_download"
                                                class="text-gray-200 hover:text-gray-500" title="Download">
                                                <i class="fas fa-download"></i>
                                            </a>
                                            <a href="#" id="national_health_insurance_resetFile"
                                                class="ml-2 text-gray-200 hover:text-gray-500" title="Delete">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="mb-4 flex justify-between items-center">
                                        <x-input-file id="pension_book" name="pension_book" class="flex-1" />
                                        @if (isset($residentApplicant) && $residentApplicant->pension_book)
                                            @php
                                                $fileName = $residentApplicant->pension_book;
                                                $fileName = \App\Helpers\CustomHelper::trimFilename($fileName, $upload);
                                            @endphp
                                            <label class="font-size8">{{ $fileName }}</label>
                                        @endif
                                        <div class="flex items-center ml-2">
                                            <a href="#" id="pension_book_download"
                                                class="text-gray-200 hover:text-gray-500" title="Download">
                                                <i class="fas fa-download"></i>
                                            </a>
                                            <a href="#" id="pension_book_resetFile"
                                                class="ml-2 text-gray-200 hover:text-gray-500" title="Delete">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="mb-4 flex justify-between items-center">
                                        <x-input-file id="bank_book" name="bank_book" class="flex-1" />
                                        @if (isset($residentApplicant) && $residentApplicant->bank_book)
                                            @php
                                                $fileName = $residentApplicant->bank_book;
                                                $fileName = \App\Helpers\CustomHelper::trimFilename($fileName, $upload);
                                            @endphp
                                            <label class="font-size8">{{ $fileName }}</label>
                                        @endif
                                        <div class="flex items-center ml-2">
                                            <a href="#" id="bank_book_download"
                                                class="text-gray-200 hover:text-gray-500" title="Download">
                                                <i class="fas fa-download"></i>
                                            </a>
                                            <a href="#" id="bank_book_resetFile"
                                                class="ml-2 text-gray-200 hover:text-gray-500" title="Delete">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="mb-4 flex justify-between items-center">
                                        <x-input-file id="my_number_card" name="my_number_card" class="flex-1" />
                                        @if (isset($residentApplicant) && $residentApplicant->my_number_card)
                                            @php
                                                $fileName = $residentApplicant->my_number_card;
                                                $fileName = \App\Helpers\CustomHelper::trimFilename($fileName, $upload);
                                            @endphp
                                            <label class="font-size8">{{ $fileName }}</label>
                                        @endif
                                        <div class="flex items-center ml-2">
                                            <a href="#" id="my_number_card_download"
                                                class="text-gray-200 hover:text-gray-500" title="Download">
                                                <i class="fas fa-download"></i>
                                            </a>
                                            <a href="#" id="my_number_card_resetFile"
                                                class="ml-2 text-gray-200 hover:text-gray-500" title="Delete">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- 面接・就職書類関係 -->
                        <div class="mt-8">
                            <h2 class="text-lg font-semibold font-color-y">
                                {{ __('applicant_reg_page.interview_andEmployment_related_documents') }}
                            </h2>
                            <div class="flex mt-4">
                                <!-- 左ブロック -->
                                <div class="w-1/2 pr-2 flex flex-col justify-between">
                                    <div class="mb-4">
                                        <label for="resume">{{ __('applicant_reg_page.resume') }}</label>
                                    </div>
                                    <div class="mb-4">
                                        <label for="license">{{ __('applicant_reg_page.license') }}</label>
                                    </div>
                                    <div class="mb-4">
                                        <label
                                            for="qualification_certificate">{{ __('applicant_reg_page.qualification_certificate') }}</label>
                                    </div>
                                    <div class="mb-4">
                                        <label
                                            for="training_completion_certificate_rinxs">{{ __('applicant_reg_page.training_completion_certificate_rinxs') }}</label>
                                    </div>
                                    <div class="mb-4">
                                        <label
                                            for="training_completion_certificate_nexus">{{ __('applicant_reg_page.training_completion_certificate_nexus') }}</label>
                                    </div>
                                    <div class="mb-4">
                                        <label
                                            for="moving_out_certificate">{{ __('applicant_reg_page.moving_out_certificate') }}</label>
                                    </div>
                                    <div class="mb-4">
                                        <label
                                            for="national_health_insurance_withdrawal_certificate">{{ __('applicant_reg_page.national_health_insurance_withdrawal_certificate') }}</label>
                                    </div>
                                    <div class="mb-4">
                                        <label
                                            for="national_pension_withdrawal_certificate	">{{ __('applicant_reg_page.national_pension_withdrawal_certificate	') }}</label>
                                    </div>
                                    <div class="mb-4">
                                        <label
                                            for="moving_in_procedure">{{ __('applicant_reg_page.moving_in_procedure') }}</label>
                                    </div>
                                    <div class="mb-4">
                                        <label
                                            for="new_address_national_health_insurance">{{ __('applicant_reg_page.new_address_national_health_insurance') }}</label>
                                    </div>
                                    <div class="mb-4">
                                        <label
                                            for="new_address_national_pension_book">{{ __('applicant_reg_page.new_address_national_pension_book') }}</label>
                                    </div>
                                </div>
                                <!-- 右ブロック -->
                                <div class="w-1/2 pl-2 flex flex-col justify-between">
                                    <div class="mb-4 flex justify-between items-center">
                                        <x-input-file id="resume" name="resume" class="flex-1" />
                                        @if (isset($residentApplicant) && $residentApplicant->resume)
                                            @php
                                                $fileName = $residentApplicant->resume;
                                                $fileName = \App\Helpers\CustomHelper::trimFilename($fileName, $upload);
                                            @endphp
                                            <label class="font-size8">{{ $fileName }}</label>
                                        @endif
                                        <div class="flex items-center ml-2">
                                            <a href="#" id="resume_download"
                                                class="text-gray-200 hover:text-gray-500" title="Download">
                                                <i class="fas fa-download"></i>
                                            </a>
                                            <a href="#" id="resume_resetFile"
                                                class="ml-2 text-gray-200 hover:text-gray-500" title="Delete">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="mb-4 flex justify-between items-center">
                                        <x-input-file id="license" name="license" class="flex-1" />
                                        @if (isset($residentApplicant) && $residentApplicant->license)
                                            @php
                                                $fileName = $residentApplicant->license;
                                                $fileName = \App\Helpers\CustomHelper::trimFilename($fileName, $upload);
                                            @endphp
                                            <label class="font-size8">{{ $fileName }}</label>
                                        @endif
                                        <div class="flex items-center ml-2">
                                            <a href="#" id="license_download"
                                                class="text-gray-200 hover:text-gray-500" title="Download">
                                                <i class="fas fa-download"></i>
                                            </a>
                                            <a href="#" id="license_resetFile"
                                                class="ml-2 text-gray-200 hover:text-gray-500" title="Delete">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="mb-4 flex justify-between items-center">
                                        <x-input-file id="qualification_certificate" name="qualification_certificate"
                                            class="flex-1" />
                                        @if (isset($residentApplicant) && $residentApplicant->qualification_certificate)
                                            @php
                                                $fileName = $residentApplicant->qualification_certificate;
                                                $fileName = \App\Helpers\CustomHelper::trimFilename($fileName, $upload);
                                            @endphp
                                            <label class="font-size8">{{ $fileName }}</label>
                                        @endif
                                        <div class="flex items-center ml-2">
                                            <a href="#" id="qualification_certificate_download"
                                                class="text-gray-200 hover:text-gray-500" title="Download">
                                                <i class="fas fa-download"></i>
                                            </a>
                                            <a href="#" id="qualification_certificate_resetFile"
                                                class="ml-2 text-gray-200 hover:text-gray-500" title="Delete">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="mb-4 flex justify-between items-center">
                                        <x-input-file id="training_completion_certificate_rinxs"
                                            name="training_completion_certificate_rinxs" class="flex-1" />
                                        @if (isset($residentApplicant) && $residentApplicant->training_completion_certificate_rinxs)
                                            @php
                                                $fileName = $residentApplicant->training_completion_certificate_rinxs;
                                                $fileName = \App\Helpers\CustomHelper::trimFilename($fileName, $upload);
                                            @endphp
                                            <label class="font-size8">{{ $fileName }}</label>
                                        @endif
                                        <div class="flex items-center ml-2">
                                            <a href="#" id="training_completion_certificate_rinxs_download"
                                                class="text-gray-200 hover:text-gray-500" title="Download">
                                                <i class="fas fa-download"></i>
                                            </a>
                                            <a href="#" id="training_completion_certificate_rinxs_resetFile"
                                                class="ml-2 text-gray-200 hover:text-gray-500" title="Delete">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="mb-4 flex justify-between items-center">
                                        <x-input-file id="training_completion_certificate_nexus"
                                            name="training_completion_certificate_nexus" class="flex-1" />
                                        @if (isset($residentApplicant) && $residentApplicant->training_completion_certificate_nexus)
                                            @php
                                                $fileName = $residentApplicant->training_completion_certificate_nexus;
                                                $fileName = \App\Helpers\CustomHelper::trimFilename($fileName, $upload);
                                            @endphp
                                            <label class="font-size8">{{ $fileName }}</label>
                                        @endif
                                        <div class="flex items-center ml-2">
                                            <a href="#" id="training_completion_certificate_nexus_download"
                                                class="text-gray-200 hover:text-gray-500" title="Download">
                                                <i class="fas fa-download"></i>
                                            </a>
                                            <a href="#" id="training_completion_certificate_nexus_resetFile"
                                                class="ml-2 text-gray-200 hover:text-gray-500" title="Delete">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="mb-4 flex justify-between items-center">
                                        <x-input-file id="moving_out_certificate" name="moving_out_certificate"
                                            class="flex-1" />
                                        @if (isset($residentApplicant) && $residentApplicant->moving_out_certificate)
                                            @php
                                                $fileName = $residentApplicant->moving_out_certificate;
                                                $fileName = \App\Helpers\CustomHelper::trimFilename($fileName, $upload);
                                            @endphp
                                            <label class="font-size8">{{ $fileName }}</label>
                                        @endif
                                        <div class="flex items-center ml-2">
                                            <a href="#" id="moving_out_certificate_download"
                                                class="text-gray-200 hover:text-gray-500" title="Download">
                                                <i class="fas fa-download"></i>
                                            </a>
                                            <a href="#" id="moving_out_certificate_resetFile"
                                                class="ml-2 text-gray-200 hover:text-gray-500" title="Delete">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="mb-4 flex justify-between items-center">
                                        <x-input-file id="national_health_insurance_withdrawal_certificate"
                                            name="national_health_insurance_withdrawal_certificate" class="flex-1" />
                                        @if (isset($residentApplicant) && $residentApplicant->national_health_insurance_withdrawal_certificate)
                                            @php
                                                $fileName =
                                                    $residentApplicant->national_health_insurance_withdrawal_certificate;
                                                $fileName = \App\Helpers\CustomHelper::trimFilename($fileName, $upload);
                                            @endphp
                                            <label class="font-size8">{{ $fileName }}</label>
                                        @endif
                                        <div class="flex items-center ml-2">
                                            <a href="#"
                                                id="national_health_insurance_withdrawal_certificate_download"
                                                class="text-gray-200 hover:text-gray-500" title="Download">
                                                <i class="fas fa-download"></i>
                                            </a>
                                            <a href="#"
                                                id="national_health_insurance_withdrawal_certificate_resetFile"
                                                class="ml-2 text-gray-200 hover:text-gray-500" title="Delete">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="mb-4 flex justify-between items-center">
                                        <x-input-file id="national_pension_withdrawal_certificate	"
                                            name="national_pension_withdrawal_certificate	" class="flex-1" />
                                        @if (isset($residentApplicant) && $residentApplicant->national_pension_withdrawal_certificate)
                                            @php
                                                $fileName = $residentApplicant->national_pension_withdrawal_certificate;
                                                $fileName = \App\Helpers\CustomHelper::trimFilename($fileName, $upload);
                                            @endphp
                                            <label class="font-size8">{{ $fileName }}</label>
                                        @endif
                                        <div class="flex items-center ml-2">
                                            <a href="#" id="national_pension_withdrawal_certificate_download"
                                                class="text-gray-200 hover:text-gray-500" title="Download">
                                                <i class="fas fa-download"></i>
                                            </a>
                                            <a href="#" id="national_pension_withdrawal_certificate_resetFile"
                                                class="ml-2 text-gray-200 hover:text-gray-500" title="Delete">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="mb-4 flex justify-between items-center">
                                        <x-input-file id="moving_in_procedure" name="moving_in_procedure"
                                            class="flex-1" />
                                        @if (isset($residentApplicant) && $residentApplicant->moving_in_procedure)
                                            @php
                                                $fileName = $residentApplicant->moving_in_procedure;
                                                $fileName = \App\Helpers\CustomHelper::trimFilename($fileName, $upload);
                                            @endphp
                                            <label class="font-size8">{{ $fileName }}</label>
                                        @endif
                                        <div class="flex items-center ml-2">
                                            <a href="#" id="moving_in_procedure_download"
                                                class="text-gray-200 hover:text-gray-500" title="Download">
                                                <i class="fas fa-download"></i>
                                            </a>
                                            <a href="#" id="moving_in_procedure_resetFile"
                                                class="ml-2 text-gray-200 hover:text-gray-500" title="Delete">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="mb-4 flex justify-between items-center">
                                        <x-input-file id="new_address_national_health_insurance"
                                            name="new_address_national_health_insurance" class="flex-1" />
                                        @if (isset($residentApplicant) && $residentApplicant->new_address_national_health_insurance)
                                            @php
                                                $fileName = $residentApplicant->new_address_national_health_insurance;
                                                $fileName = \App\Helpers\CustomHelper::trimFilename($fileName, $upload);
                                            @endphp
                                            <label class="font-size8">{{ $fileName }}</label>
                                        @endif
                                        <div class="flex items-center ml-2">
                                            <a href="#" id="new_address_national_health_insurance_download"
                                                class="text-gray-200 hover:text-gray-500" title="Download">
                                                <i class="fas fa-download"></i>
                                            </a>
                                            <a href="#" id="new_address_national_health_insurance_resetFile"
                                                class="ml-2 text-gray-200 hover:text-gray-500" title="Delete">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="mb-4 flex justify-between items-center">
                                        <x-input-file id="new_address_national_pension_book"
                                            name="new_address_national_pension_book" class="flex-1" />
                                        @if (isset($residentApplicant) && $residentApplicant->new_address_national_pension_book)
                                            @php
                                                $fileName = $residentApplicant->new_address_national_pension_book;
                                                $fileName = \App\Helpers\CustomHelper::trimFilename($fileName, $upload);
                                            @endphp
                                            <label class="font-size8">{{ $fileName }}</label>
                                        @endif
                                        <div class="flex items-center ml-2">
                                            <a href="#" id="new_address_national_pension_book_download"
                                                class="text-gray-200 hover:text-gray-500" title="Download">
                                                <i class="fas fa-download"></i>
                                            </a>
                                            <a href="#" id="new_address_national_pension_book_resetFile"
                                                class="ml-2 text-gray-200 hover:text-gray-500" title="Delete">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="mt-6">
                            <x-primary-button class="ml-4">
                                {{ __('登録') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
