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
                                            <x-data-display :value="$name ?? ''" />
                                        </div>

                                        <div class="mb-4">
                                            <label
                                                class="w-32 inline-block">{{ __('applicant_reg_page.user_name') }}</label>
                                            <x-data-display :value="$username ?? ''" />
                                        </div>

                                        <div class="mb-4">
                                            <label
                                                class="w-32 inline-block">{{ __('applicant_reg_page.mail_address') }}</label>
                                            <x-data-display :value="$email ?? ''" />
                                        </div>

                                        <div class="mb-4">
                                            <label
                                                class="w-32 inline-block">{{ __('applicant_reg_page.country') }}</label>
                                            <x-data-display :value="$country ?? ''" />
                                        </div>

                                        <div class="mb-4">
                                            <label class="w-32 inline-block">{{ __('applicant_reg_page.age') }}</label>
                                            <x-data-display :value="$age ?? ''" />
                                        </div>

                                        <div class="mb-4">
                                            <label
                                                class="w-32 inline-block">{{ __('applicant_reg_page.jpn_lang_proficiency') }}</label>
                                            <x-data-display :value="$japanese_level ?? ''" />
                                        </div>
                                    </div>

                                    <!-- 右ブロック -->
                                    <div class="flex flex-col">
                                        <div class="mb-4">
                                            <label
                                                class="w-32 inline-block">{{ __('applicant_reg_page.kana') }}</label>
                                            <x-data-display :value="$name_kana ?? ''" />
                                        </div>

                                        <div class="mb-4">
                                            <label
                                                class="w-32 inline-block">{{ __('applicant_reg_page.password') }}</label>
                                            <x-data-display :value="$password ?? ''" />
                                        </div>

                                        <div class="mb-4">
                                            <label
                                                class="w-32 inline-block">{{ __('applicant_reg_page.language') }}</label>
                                            <x-data-display :value="$language ?? ''" />
                                        </div>

                                        <div class="mb-4">
                                            <label
                                                class="w-32 inline-block">{{ __('applicant_reg_page.gender') }}</label>
                                            <x-data-display :value="$gender ?? ''" />
                                        </div>

                                        <div class="mb-4">
                                            <label
                                                class="w-32 inline-block">{{ __('applicant_reg_page.live_lesson_class') }}</label>
                                            <x-data-display :value="$live_class_lesson ?? ''" />
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
                                        <div class="flex items-center ml-2">
                                            <a href="#" class="text-gray-200 hover:text-gray-500"
                                                title="Download">
                                                <i class="fas fa-download"></i>
                                            </a>
                                            <a href="#" class="ml-2 text-gray-200 hover:text-gray-500"
                                                title="Delete">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="mb-4 flex justify-between items-center">
                                        <x-input-file id="proof_photo" name="proof_photo" class="flex-1" />
                                        <div class="flex items-center ml-2">
                                            <a href="#" class="text-gray-200 hover:text-gray-500"
                                                title="Download">
                                                <i class="fas fa-download"></i>
                                            </a>
                                            <a href="#" class="ml-2 text-gray-200 hover:text-gray-500"
                                                title="Delete">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="mb-4 flex justify-between items-center">
                                        <x-input-file id="application_form" name="application_form" class="flex-1" />
                                        <div class="flex items-center ml-2">
                                            <a href="#" class="text-gray-200 hover:text-gray-500"
                                                title="Download">
                                                <i class="fas fa-download"></i>
                                            </a>
                                            <a href="#" class="ml-2 text-gray-200 hover:text-gray-500"
                                                title="Delete">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="mb-4 flex justify-between items-center">
                                        <x-input-file id="passport" name="passport" class="flex-1" />
                                        <div class="flex items-center ml-2">
                                            <a href="#" class="text-gray-200 hover:text-gray-500"
                                                title="Download">
                                                <i class="fas fa-download"></i>
                                            </a>
                                            <a href="#" class="ml-2 text-gray-200 hover:text-gray-500"
                                                title="Delete">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="mb-4 flex justify-between items-center">
                                        <x-input-file id="university_graduation_certificate"
                                            name="university_graduation_certificate" class="flex-1" />
                                        <div class="flex items-center ml-2">
                                            <a href="#" class="text-gray-200 hover:text-gray-500"
                                                title="Download">
                                                <i class="fas fa-download"></i>
                                            </a>
                                            <a href="#" class="ml-2 text-gray-200 hover:text-gray-500"
                                                title="Delete">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="mb-4 flex justify-between items-center">
                                        <x-input-file id="university_credits" name="university_credits"
                                            class="flex-1" />
                                        <div class="flex items-center ml-2">
                                            <a href="#" class="text-gray-200 hover:text-gray-500"
                                                title="Download">
                                                <i class="fas fa-download"></i>
                                            </a>
                                            <a href="#" class="ml-2 text-gray-200 hover:text-gray-500"
                                                title="Delete">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="mb-4 flex justify-between items-center">
                                        <x-input-file id="previous_enrollment_certificate"
                                            name="previous_enrollment_certificate" class="flex-1" />
                                        <div class="flex items-center ml-2">
                                            <a href="#" class="text-gray-200 hover:text-gray-500"
                                                title="Download">
                                                <i class="fas fa-download"></i>
                                            </a>
                                            <a href="#" class="ml-2 text-gray-200 hover:text-gray-500"
                                                title="Delete">
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
                                        <div class="flex items-center ml-2">
                                            <a href="#" class="text-gray-200 hover:text-gray-500"
                                                title="Download">
                                                <i class="fas fa-download"></i>
                                            </a>
                                            <a href="#" class="ml-2 text-gray-200 hover:text-gray-500"
                                                title="Delete">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="mb-4 flex justify-between items-center">
                                        <x-input-file id="practical_training_notification"
                                            name="practical_training_notification" class="flex-1" />
                                        <div class="flex items-center ml-2">
                                            <a href="#" class="text-gray-200 hover:text-gray-500"
                                                title="Download">
                                                <i class="fas fa-download"></i>
                                            </a>
                                            <a href="#" class="ml-2 text-gray-200 hover:text-gray-500"
                                                title="Delete">
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
                                        <label for="my_number_card"></label>
                                    </div>
                                </div>
                                <!-- 右ブロック -->
                                <div class="w-1/2 pl-2 flex flex-col justify-between">
                                    <div class="mb-4 flex justify-between items-center">
                                        <x-input-file id="residency_card" name="residency_card" class="flex-1" />
                                        <div class="flex items-center ml-2">
                                            <a href="#" class="text-gray-200 hover:text-gray-500"
                                                title="Download">
                                                <i class="fas fa-download"></i>
                                            </a>
                                            <a href{{ __('applicant_reg_page.my_number_card') }}="#"
                                                class="ml-2 text-gray-200 hover:text-gray-500" title="Delete">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="mb-4 flex justify-between items-center">
                                        <x-input-file id="resident_certificate" name="resident_certificate"
                                            class="flex-1" />
                                        <div class="flex items-center ml-2">
                                            <a href="#" class="text-gray-200 hover:text-gray-500"
                                                title="Download">
                                                <i class="fas fa-download"></i>
                                            </a>
                                            <a href="#" class="ml-2 text-gray-200 hover:text-gray-500"
                                                title="Delete">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="mb-4 flex justify-between items-center">
                                        <x-input-file id="national_health_insurance" name="national_health_insurance"
                                            class="flex-1" />
                                        <div class="flex items-center ml-2">
                                            <a href="#" class="text-gray-200 hover:text-gray-500"
                                                title="Download">
                                                <i class="fas fa-download"></i>
                                            </a>
                                            <a href="#" class="ml-2 text-gray-200 hover:text-gray-500"
                                                title="Delete">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="mb-4 flex justify-between items-center">
                                        <x-input-file id="pension_book" name="pension_book" class="flex-1" />
                                        <div class="flex items-center ml-2">
                                            <a href="#" class="text-gray-200 hover:text-gray-500"
                                                title="Download">
                                                <i class="fas fa-download"></i>
                                            </a>
                                            <a href="#" class="ml-2 text-gray-200 hover:text-gray-500"
                                                title="Delete">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="mb-4 flex justify-between items-center">
                                        <x-input-file id="bank_book" name="bank_book" class="flex-1" />
                                        <div class="flex items-center ml-2">
                                            <a href="#" class="text-gray-200 hover:text-gray-500"
                                                title="Download">
                                                <i class="fas fa-download"></i>
                                            </a>
                                            <a href="#" class="ml-2 text-gray-200 hover:text-gray-500"
                                                title="Delete">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="mb-4 flex justify-between items-center">
                                        <x-input-file id="my_number_card" name="my_number_card" class="flex-1" />
                                        <div class="flex items-center ml-2">
                                            <a href="#" class="text-gray-200 hover:text-gray-500"
                                                title="Download">
                                                <i class="fas fa-download"></i>
                                            </a>
                                            <a href="#" class="ml-2 text-gray-200 hover:text-gray-500"
                                                title="Delete">
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
                                        <div class="flex items-center ml-2">
                                            <a href="#" class="text-gray-200 hover:text-gray-500"
                                                title="Download">
                                                <i class="fas fa-download"></i>
                                            </a>
                                            <a href="#" class="ml-2 text-gray-200 hover:text-gray-500"
                                                title="Delete">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="mb-4 flex justify-between items-center">
                                        <x-input-file id="license" name="license" class="flex-1" />
                                        <div class="flex items-center ml-2">
                                            <a href="#" class="text-gray-200 hover:text-gray-500"
                                                title="Download">
                                                <i class="fas fa-download"></i>
                                            </a>
                                            <a href="#" class="ml-2 text-gray-200 hover:text-gray-500"
                                                title="Delete">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="mb-4 flex justify-between items-center">
                                        <x-input-file id="qualification_certificate" name="qualification_certificate"
                                            class="flex-1" />
                                        <div class="flex items-center ml-2">
                                            <a href="#" class="text-gray-200 hover:text-gray-500"
                                                title="Download">
                                                <i class="fas fa-download"></i>
                                            </a>
                                            <a href="#" class="ml-2 text-gray-200 hover:text-gray-500"
                                                title="Delete">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="mb-4 flex justify-between items-center">
                                        <x-input-file id="training_completion_certificate_rinxs"
                                            name="training_completion_certificate_rinxs" class="flex-1" />
                                        <div class="flex items-center ml-2">
                                            <a href="#" class="text-gray-200 hover:text-gray-500"
                                                title="Download">
                                                <i class="fas fa-download"></i>
                                            </a>
                                            <a href="#" class="ml-2 text-gray-200 hover:text-gray-500"
                                                title="Delete">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="mb-4 flex justify-between items-center">
                                        <x-input-file id="moving_out_certificate" name="moving_out_certificate"
                                            class="flex-1" />
                                        <div class="flex items-center ml-2">
                                            <a href="#" class="text-gray-200 hover:text-gray-500"
                                                title="Download">
                                                <i class="fas fa-download"></i>
                                            </a>
                                            <a href="#" class="ml-2 text-gray-200 hover:text-gray-500"
                                                title="Delete">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="mb-4 flex justify-between items-center">
                                        <x-input-file id="national_health_insurance_withdrawal_certificate"
                                            name="national_health_insurance_withdrawal_certificate" class="flex-1" />
                                        <div class="flex items-center ml-2">
                                            <a href="#" class="text-gray-200 hover:text-gray-500"
                                                title="Download">
                                                <i class="fas fa-download"></i>
                                            </a>
                                            <a href="#" class="ml-2 text-gray-200 hover:text-gray-500"
                                                title="Delete">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="mb-4 flex justify-between items-center">
                                        <x-input-file id="national_pension_withdrawal_certificate	"
                                            name="national_pension_withdrawal_certificate	" class="flex-1" />
                                        <div class="flex items-center ml-2">
                                            <a href="#" class="text-gray-200 hover:text-gray-500"
                                                title="Download">
                                                <i class="fas fa-download"></i>
                                            </a>
                                            <a href="#" class="ml-2 text-gray-200 hover:text-gray-500"
                                                title="Delete">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="mb-4 flex justify-between items-center">
                                        <x-input-file id="moving_in_procedure" name="moving_in_procedure"
                                            class="flex-1" />
                                        <div class="flex items-center ml-2">
                                            <a href="#" class="text-gray-200 hover:text-gray-500"
                                                title="Download">
                                                <i class="fas fa-download"></i>
                                            </a>
                                            <a href="#" class="ml-2 text-gray-200 hover:text-gray-500"
                                                title="Delete">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="mb-4 flex justify-between items-center">
                                        <x-input-file id="new_address_national_health_insurance"
                                            name="new_address_national_health_insurance" class="flex-1" />
                                        <div class="flex items-center ml-2">
                                            <a href="#" class="text-gray-200 hover:text-gray-500"
                                                title="Download">
                                                <i class="fas fa-download"></i>
                                            </a>
                                            <a href="#" class="ml-2 text-gray-200 hover:text-gray-500"
                                                title="Delete">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="mb-4 flex justify-between items-center">
                                        <x-input-file id="new_address_national_pension_book"
                                            name="new_address_national_pension_book" class="flex-1" />
                                        <div class="flex items-center ml-2">
                                            <a href="#" class="text-gray-200 hover:text-gray-500"
                                                title="Download">
                                                <i class="fas fa-download"></i>
                                            </a>
                                            <a href="#" class="ml-2 text-gray-200 hover:text-gray-500"
                                                title="Delete">
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
