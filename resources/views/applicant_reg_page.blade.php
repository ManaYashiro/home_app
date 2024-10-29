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
                                {{ __('applicant_reg_page.COE_application_documents') }}
                            </h2>
                            @php
                                $filenames = [
                                    'residency_certificate_application',
                                    'proof_photo',
                                    'application_form',
                                    'passport',
                                    'university_graduation_certificate',
                                    'university_credits',
                                    'previous_enrollment_certificate',
                                ];
                            @endphp
                            @foreach ($filenames as $filename)
                                <div class="flex mt-4 justify-between">
                                    <div class="pr-2 w-1/2 items-center flex">
                                        <label
                                            for="{{ $filename }}">{{ __('applicant_reg_page.' . $filename) }}</label>
                                    </div>
                                    <x-file-input-block-component :alldata="[
                                        'filename' => $filename,
                                        'data' => $residentApplicant->$filename,
                                        'upload' => $upload,
                                    ]" />
                                </div>
                            @endforeach
                        </div>

                        <!-- ビザ申請書類関係 -->
                        <div class="mt-8">
                            <h2 class="text-lg font-semibold font-color-y">
                                {{ __('applicant_reg_page.visa_application_related_documents') }}
                            </h2>
                            @php
                                $filenames = ['residency_certificate', 'practical_training_notification'];
                            @endphp
                            @foreach ($filenames as $filename)
                                <div class="flex mt-4 justify-between">
                                    <div class="pr-2 w-1/2 items-center flex">
                                        <label
                                            for="{{ $filename }}">{{ __('applicant_reg_page.' . $filename) }}</label>
                                    </div>
                                    <x-file-input-block-component :alldata="[
                                        'filename' => $filename,
                                        'data' => $residentApplicant->$filename,
                                        'upload' => $upload,
                                    ]" />
                                </div>
                            @endforeach
                        </div>

                        <!-- 入国後書類関係 -->
                        <div class="mt-8">
                            <h2 class="text-lg font-semibold font-color-y">
                                {{ __('applicant_reg_page.post_entry_documentation') }}
                            </h2>
                            @php
                                $filenames = [
                                    'residency_card',
                                    'resident_certificate',
                                    'national_health_insurance',
                                    'pension_book',
                                    'bank_book',
                                    'my_number_card',
                                ];
                            @endphp
                            @foreach ($filenames as $filename)
                                <div class="flex mt-4 justify-between">
                                    <div class="pr-2 w-1/2 items-center flex">
                                        <label
                                            for="{{ $filename }}">{{ __('applicant_reg_page.' . $filename) }}</label>
                                    </div>
                                    <x-file-input-block-component :alldata="[
                                        'filename' => $filename,
                                        'data' => $residentApplicant->$filename,
                                        'upload' => $upload,
                                    ]" />
                                </div>
                            @endforeach
                        </div>

                        <!-- 面接・就職書類関係 -->
                        <div class="mt-8">
                            <h2 class="text-lg font-semibold font-color-y">
                                {{ __('applicant_reg_page.interview_andEmployment_related_documents') }}
                            </h2>
                            @php
                                $filenames = [
                                    'resume',
                                    'license',
                                    'qualification_certificate',
                                    'training_completion_certificate_rinxs',
                                    'training_completion_certificate_nexus',
                                    'moving_out_certificate',
                                    'national_health_insurance_withdrawal_certificate',
                                    'national_pension_withdrawal_certificate',
                                    'moving_in_procedure',
                                    'new_address_national_health_insurance',
                                    'new_address_national_pension_book',
                                ];
                            @endphp
                            @foreach ($filenames as $filename)
                                <div class="flex mt-4 justify-between">
                                    <div class="pr-2 w-1/2 items-center flex">
                                        <label
                                            for="{{ $filename }}">{{ __('applicant_reg_page.' . $filename) }}</label>
                                    </div>
                                    <x-file-input-block-component :alldata="[
                                        'filename' => $filename,
                                        'data' => $residentApplicant->$filename,
                                        'upload' => $upload,
                                    ]" />
                                </div>
                            @endforeach
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
