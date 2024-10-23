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
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <div class="py-12">
                        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                                <div class="p-6 text-gray-900 grid grid-cols-2 gap-4">
                                    <!-- 左ブロック -->
                                    <div class="flex flex-col">
                                        <div class="mb-4">
                                            <label for="">{{ __('applicant_reg_page.userId') }}</label>
                                            <span><!-- {{ $userId ?? 'データがありません' }} --></span>
                                        </div>

                                        <div class="mb-4">
                                            <label for="">{{ __('applicant_reg_page.name') }}</label>
                                            <span><!-- {{ $name ?? 'データがありません' }} --></span>
                                        </div>

                                        <div class="mb-4">
                                            <label for="">{{ __('applicant_reg_page.userId') }}</label>
                                            <span><!-- {{ $userName ?? 'データがありません' }} --></span>
                                        </div>

                                        <div class="mb-4">
                                            <label for="">{{ __('applicant_reg_page.userName') }}</label>
                                            <span><!-- {{ $email ?? 'データがありません' }} --></span>
                                        </div>

                                        <div class="mb-4">
                                            <label for="">{{ __('applicant_reg_page.country') }}</label>
                                            <span><!-- {{ $country ?? 'データがありません' }} --></span>
                                        </div>

                                        <div class="mb-4">
                                            <label for="">{{ __('applicant_reg_page.age') }}</label>
                                            <span><!-- {{ $age ?? 'データがありません' }} --></span>
                                        </div>

                                        <div class="mb-4">
                                            <label
                                                for="">{{ __('applicant_reg_page.jpnLangProficiency') }}</label>
                                            <span><!-- {{ $jpnLevel ?? 'データがありません' }} --></span>
                                        </div>
                                    </div>

                                    <!-- 右ブロック -->
                                    <div class="flex flex-col">
                                        <div class="mb-4">
                                            <label for="">{{ __('applicant_reg_page.kana') }}</label>
                                            <span><!-- {{ $kana ?? 'データがありません' }} --></span>
                                        </div>

                                        <div class="mb-4">
                                            <label for="">{{ __('applicant_reg_page.passWord') }}</label>
                                            <span><!-- {{ $password ?? 'データがありません' }} --></span>
                                        </div>

                                        <div class="mb-4">
                                            <label for="">{{ __('applicant_reg_page.language') }}</label>
                                            <span><!-- {{ $language ?? 'データがありません' }} --></span>
                                        </div>

                                        <div class="mb-4">
                                            <label for="">{{ __('applicant_reg_page.gender') }}</label>
                                            <span><!-- {{ $gender ?? 'データがありません' }} --></span>
                                        </div>

                                        <div class="mb-4">
                                            <label
                                                for="">{{ __('applicant_reg_page.liveLessonClass') }}</label>
                                            <span><!-- {{ $liveLesson ?? 'データがありません' }} --></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- 在留資格認定証明書交付申請書類関係 -->
                    <div class="mt-8">
                        <h2 class="text-lg font-semibold font-color-y">
                            {{ __('applicant_reg_page.COEApplicationDocuments') }}</h2>
                        <div class="flex mt-4">
                            <!-- 左ブロック -->
                            <div class="w-1/2 pr-2 flex flex-col justify-between">
                                <div class="mb-4">
                                    <label
                                        for="residencyCertificateApplication">{{ __('applicant_reg_page.residencyCertificateApplication') }}</label>
                                </div>
                                <div class="mb-4">
                                    <label for="proofPhoto">{{ __('applicant_reg_page.proofPhoto') }}</label>
                                </div>
                                <div class="mb-4">
                                    <label for="applicationForm">{{ __('applicant_reg_page.applicationForm') }}</label>
                                </div>
                                <div class="mb-4">
                                    <label for="passport">{{ __('applicant_reg_page.passport') }}</label>
                                </div>
                                <div class="mb-4">
                                    <label
                                        for="universityGraduationCertificate">{{ __('applicant_reg_page.universityGraduationCertificate') }}</label>
                                </div>
                                <div class="mb-4">
                                    <label
                                        for="universityCredits">{{ __('applicant_reg_page.universityCredits') }}</label>
                                </div>
                                <div class="mb-4">
                                    <label
                                        for="previousEnrollmentCertificate">{{ __('applicant_reg_page.previousEnrollmentCertificate') }}</label>
                                </div>
                            </div>
                            <!-- 右ブロック -->
                            <div class="w-1/2 pl-2 flex flex-col justify-between">
                                <div class="mb-4 flex justify-between items-center">
                                    <x-input-file id="residencyCertificateApplication"
                                        name="residencyCertificateApplication" required class="flex-1" />
                                    <div class="flex items-center ml-2">
                                        <a href="#" class="text-gray-200 hover:text-gray-500" title="ダウンロード">
                                            <i class="fas fa-download"></i>
                                        </a>
                                        <a href="#" class="ml-2 text-gray-200 hover:text-gray-500" title="削除">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="mb-4 flex justify-between items-center">
                                    <x-input-file id="proofPhoto" name="proofPhoto" required class="flex-1" />
                                    <div class="flex items-center ml-2">
                                        <a href="#" class="text-gray-200 hover:text-gray-500" title="ダウンロード">
                                            <i class="fas fa-download"></i>
                                        </a>
                                        <a href="#" class="ml-2 text-gray-200 hover:text-gray-500" title="削除">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="mb-4 flex justify-between items-center">
                                    <x-input-file id="applicationForm" name="applicationForm" required class="flex-1" />
                                    <div class="flex items-center ml-2">
                                        <a href="#" class="text-gray-200 hover:text-gray-500" title="ダウンロード">
                                            <i class="fas fa-download"></i>
                                        </a>
                                        <a href="#" class="ml-2 text-gray-200 hover:text-gray-500" title="削除">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="mb-4 flex justify-between items-center">
                                    <x-input-file id="passport" name="passport" required class="flex-1" />
                                    <div class="flex items-center ml-2">
                                        <a href="#" class="text-gray-200 hover:text-gray-500" title="ダウンロード">
                                            <i class="fas fa-download"></i>
                                        </a>
                                        <a href="#" class="ml-2 text-gray-200 hover:text-gray-500"
                                            title="削除">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="mb-4 flex justify-between items-center">
                                    <x-input-file id="universityGraduationCertificate"
                                        name="universityGraduationCertificate" required class="flex-1" />
                                    <div class="flex items-center ml-2">
                                        <a href="#" class="text-gray-200 hover:text-gray-500" title="ダウンロード">
                                            <i class="fas fa-download"></i>
                                        </a>
                                        <a href="#" class="ml-2 text-gray-200 hover:text-gray-500"
                                            title="削除">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="mb-4 flex justify-between items-center">
                                    <x-input-file id="universityCredits" name="universityCredits" required
                                        class="flex-1" />
                                    <div class="flex items-center ml-2">
                                        <a href="#" class="text-gray-200 hover:text-gray-500" title="ダウンロード">
                                            <i class="fas fa-download"></i>
                                        </a>
                                        <a href="#" class="ml-2 text-gray-200 hover:text-gray-500"
                                            title="削除">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="mb-4 flex justify-between items-center">
                                    <x-input-file id="previousEnrollmentCertificate"
                                        name="previousEnrollmentCertificate" required class="flex-1" />
                                    <div class="flex items-center ml-2">
                                        <a href="#" class="text-gray-200 hover:text-gray-500" title="ダウンロード">
                                            <i class="fas fa-download"></i>
                                        </a>
                                        <a href="#" class="ml-2 text-gray-200 hover:text-gray-500"
                                            title="削除">
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
                            {{ __('applicant_reg_page.VisaApplicationRelatedDocuments') }}</h2>
                        <div class="flex mt-4">
                            <!-- 左ブロック -->
                            <div class="w-1/2 pr-2 flex flex-col justify-between">
                                <div class="mb-4">
                                    <label
                                        for="residencyCertificate">{{ __('applicant_reg_page.residencyCertificate') }}</label>
                                </div>
                                <div class="mb-4">
                                    <label
                                        for="practicalTrainingNotification">{{ __('applicant_reg_page.practicalTrainingNotification') }}</label>
                                </div>
                            </div>
                            <!-- 右ブロック -->
                            <div class="w-1/2 pl-2 flex flex-col justify-between">
                                <div class="mb-4 flex justify-between items-center">
                                    <x-input-file id="residencyCertificate" name="residencyCertificate" required
                                        class="flex-1" />
                                    <div class="flex items-center ml-2">
                                        <a href="#" class="text-gray-200 hover:text-gray-500" title="ダウンロード">
                                            <i class="fas fa-download"></i>
                                        </a>
                                        <a href="#" class="ml-2 text-gray-200 hover:text-gray-500"
                                            title="削除">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="mb-4 flex justify-between items-center">
                                    <x-input-file id="practicalTrainingNotification"
                                        name="practicalTrainingNotification" required class="flex-1" />
                                    <div class="flex items-center ml-2">
                                        <a href="#" class="text-gray-200 hover:text-gray-500" title="ダウンロード">
                                            <i class="fas fa-download"></i>
                                        </a>
                                        <a href="#" class="ml-2 text-gray-200 hover:text-gray-500"
                                            title="削除">
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
                            {{ __('applicant_reg_page.practicalTrainingNotification') }}</h2>
                        <div class="flex mt-4">
                            <!-- 左ブロック -->
                            <div class="w-1/2 pr-2 flex flex-col justify-between">
                                <div class="mb-4">
                                    <label for="residencyCard">{{ __('applicant_reg_page.residencyCard') }}</label>
                                </div>
                                <div class="mb-4">
                                    <label
                                        for="residentCertificate">{{ __('applicant_reg_page.residentCertificate') }}</label>
                                </div>
                                <div class="mb-4">
                                    <label
                                        for="nationalHealthInsurance">{{ __('applicant_reg_page.nationalHealthInsurance') }}</label>
                                </div>
                                <div class="mb-4">
                                    <label for="pensionBook">{{ __('applicant_reg_page.pensionBook') }}</label>
                                </div>
                                <div class="mb-4">
                                    <label for="bankBook">{{ __('applicant_reg_page.bankBook') }}</label>
                                </div>
                                <div class="mb-4">
                                    <label for="myNumberCard"></label>
                                </div>
                            </div>
                            <!-- 右ブロック -->
                            <div class="w-1/2 pl-2 flex flex-col justify-between">
                                <div class="mb-4 flex justify-between items-center">
                                    <x-input-file id="residencyCard" name="residencyCard" required class="flex-1" />
                                    <div class="flex items-center ml-2">
                                        <a href="#" class="text-gray-200 hover:text-gray-500" title="ダウンロード">
                                            <i class="fas fa-download"></i>
                                        </a>
                                        <a href{{ __('applicant_reg_page.myNumberCard') }}="#"
                                            class="ml-2 text-gray-200 hover:text-gray-500" title="削除">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="mb-4 flex justify-between items-center">
                                    <x-input-file id="residentCertificate" name="residentCertificate" required
                                        class="flex-1" />
                                    <div class="flex items-center ml-2">
                                        <a href="#" class="text-gray-200 hover:text-gray-500" title="ダウンロード">
                                            <i class="fas fa-download"></i>
                                        </a>
                                        <a href="#" class="ml-2 text-gray-200 hover:text-gray-500"
                                            title="削除">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="mb-4 flex justify-between items-center">
                                    <x-input-file id="nationalHealthInsurance" name="nationalHealthInsurance" required
                                        class="flex-1" />
                                    <div class="flex items-center ml-2">
                                        <a href="#" class="text-gray-200 hover:text-gray-500" title="ダウンロード">
                                            <i class="fas fa-download"></i>
                                        </a>
                                        <a href="#" class="ml-2 text-gray-200 hover:text-gray-500"
                                            title="削除">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="mb-4 flex justify-between items-center">
                                    <x-input-file id="pensionBook" name="pensionBook" required class="flex-1" />
                                    <div class="flex items-center ml-2">
                                        <a href="#" class="text-gray-200 hover:text-gray-500" title="ダウンロード">
                                            <i class="fas fa-download"></i>
                                        </a>
                                        <a href="#" class="ml-2 text-gray-200 hover:text-gray-500"
                                            title="削除">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="mb-4 flex justify-between items-center">
                                    <x-input-file id="bankBook" name="bankBook" required class="flex-1" />
                                    <div class="flex items-center ml-2">
                                        <a href="#" class="text-gray-200 hover:text-gray-500" title="ダウンロード">
                                            <i class="fas fa-download"></i>
                                        </a>
                                        <a href="#" class="ml-2 text-gray-200 hover:text-gray-500"
                                            title="削除">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="mb-4 flex justify-between items-center">
                                    <x-input-file id="myNumberCard" name="myNumberCard" required class="flex-1" />
                                    <div class="flex items-center ml-2">
                                        <a href="#" class="text-gray-200 hover:text-gray-500" title="ダウンロード">
                                            <i class="fas fa-download"></i>
                                        </a>
                                        <a href="#" class="ml-2 text-gray-200 hover:text-gray-500"
                                            title="削除">
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
                            {{ __('applicant_reg_page.interviewAndEmploymentRelatedDocuments') }}
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
                                        for="qualificationCertificate">{{ __('applicant_reg_page.qualificationCertificate') }}</label>
                                </div>
                                <div class="mb-4">
                                    <label
                                        for="trainingCompletionCertificateRinxs">{{ __('applicant_reg_page.trainingCompletionCertificateRinxs') }}</label>
                                </div>
                                <div class="mb-4">
                                    <label
                                        for="trainingCompletionCertificateNexus">{{ __('applicant_reg_page.trainingCompletionCertificateNexus') }}</label>
                                </div>
                                <div class="mb-4">
                                    <label
                                        for="movingOutCertificate">{{ __('applicant_reg_page.movingOutCertificate') }}</label>
                                </div>
                                <div class="mb-4">
                                    <label
                                        for="nationalHealthInsuranceWithdrawalCertificate">{{ __('applicant_reg_page.nationalHealthInsuranceWithdrawalCertificate') }}</label>
                                </div>
                                <div class="mb-4">
                                    <label
                                        for="nationalPensionWithdrawalCertificate">{{ __('applicant_reg_page.nationalPensionWithdrawalCertificate') }}</label>
                                </div>
                                <div class="mb-4">
                                    <label
                                        for="movingInProcedure">{{ __('applicant_reg_page.movingInProcedure') }}</label>
                                </div>
                                <div class="mb-4">
                                    <label
                                        for="newAddressNationalHealthInsurance">{{ __('applicant_reg_page.newAddressNationalHealthInsurance') }}</label>
                                </div>
                                <div class="mb-4">
                                    <label
                                        for="newAddressNationalPensionBook">{{ __('applicant_reg_page.newAddressNationalPensionBook') }}</label>
                                </div>
                            </div>
                            <!-- 右ブロック -->
                            <div class="w-1/2 pl-2 flex flex-col justify-between">
                                <div class="mb-4 flex justify-between items-center">
                                    <x-input-file id="resume" name="resume" required class="flex-1" />
                                    <div class="flex items-center ml-2">
                                        <a href="#" class="text-gray-200 hover:text-gray-500" title="ダウンロード">
                                            <i class="fas fa-download"></i>
                                        </a>
                                        <a href="#" class="ml-2 text-gray-200 hover:text-gray-500"
                                            title="削除">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="mb-4 flex justify-between items-center">
                                    <x-input-file id="license" name="license" required class="flex-1" />
                                    <div class="flex items-center ml-2">
                                        <a href="#" class="text-gray-200 hover:text-gray-500" title="ダウンロード">
                                            <i class="fas fa-download"></i>
                                        </a>
                                        <a href="#" class="ml-2 text-gray-200 hover:text-gray-500"
                                            title="削除">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="mb-4 flex justify-between items-center">
                                    <x-input-file id="qualificationCertificate" name="qualificationCertificate"
                                        required class="flex-1" />
                                    <div class="flex items-center ml-2">
                                        <a href="#" class="text-gray-200 hover:text-gray-500" title="ダウンロード">
                                            <i class="fas fa-download"></i>
                                        </a>
                                        <a href="#" class="ml-2 text-gray-200 hover:text-gray-500"
                                            title="削除">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="mb-4 flex justify-between items-center">
                                    <x-input-file id="trainingCompletionCertificateRinxs"
                                        name="trainingCompletionCertificateRinxs" required class="flex-1" />
                                    <div class="flex items-center ml-2">
                                        <a href="#" class="text-gray-200 hover:text-gray-500" title="ダウンロード">
                                            <i class="fas fa-download"></i>
                                        </a>
                                        <a href="#" class="ml-2 text-gray-200 hover:text-gray-500"
                                            title="削除">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="mb-4 flex justify-between items-center">
                                    <x-input-file id="movingOutCertificate" name="movingOutCertificate" required
                                        class="flex-1" />
                                    <div class="flex items-center ml-2">
                                        <a href="#" class="text-gray-200 hover:text-gray-500" title="ダウンロード">
                                            <i class="fas fa-download"></i>
                                        </a>
                                        <a href="#" class="ml-2 text-gray-200 hover:text-gray-500"
                                            title="削除">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="mb-4 flex justify-between items-center">
                                    <x-input-file id="nationalHealthInsuranceWithdrawalCertificate"
                                        name="nationalHealthInsuranceWithdrawalCertificate" required class="flex-1" />
                                    <div class="flex items-center ml-2">
                                        <a href="#" class="text-gray-200 hover:text-gray-500" title="ダウンロード">
                                            <i class="fas fa-download"></i>
                                        </a>
                                        <a href="#" class="ml-2 text-gray-200 hover:text-gray-500"
                                            title="削除">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="mb-4 flex justify-between items-center">
                                    <x-input-file id="nationalPensionWithdrawalCertificate"
                                        name="nationalPensionWithdrawalCertificate" required class="flex-1" />
                                    <div class="flex items-center ml-2">
                                        <a href="#" class="text-gray-200 hover:text-gray-500" title="ダウンロード">
                                            <i class="fas fa-download"></i>
                                        </a>
                                        <a href="#" class="ml-2 text-gray-200 hover:text-gray-500"
                                            title="削除">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="mb-4 flex justify-between items-center">
                                    <x-input-file id="movingInProcedure" name="movingInProcedure" required
                                        class="flex-1" />
                                    <div class="flex items-center ml-2">
                                        <a href="#" class="text-gray-200 hover:text-gray-500" title="ダウンロード">
                                            <i class="fas fa-download"></i>
                                        </a>
                                        <a href="#" class="ml-2 text-gray-200 hover:text-gray-500"
                                            title="削除">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="mb-4 flex justify-between items-center">
                                    <x-input-file id="newAddressNationalHealthInsurance"
                                        name="newAddressNationalHealthInsurance" required class="flex-1" />
                                    <div class="flex items-center ml-2">
                                        <a href="#" class="text-gray-200 hover:text-gray-500" title="ダウンロード">
                                            <i class="fas fa-download"></i>
                                        </a>
                                        <a href="#" class="ml-2 text-gray-200 hover:text-gray-500"
                                            title="削除">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="mb-4 flex justify-between items-center">
                                    <x-input-file id="newAddressNationalPensionBook"
                                        name="newAddressNationalPensionBook" required class="flex-1" />
                                    <div class="flex items-center ml-2">
                                        <a href="#" class="text-gray-200 hover:text-gray-500" title="ダウンロード">
                                            <i class="fas fa-download"></i>
                                        </a>
                                        <a href="#" class="ml-2 text-gray-200 hover:text-gray-500"
                                            title="削除">
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
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
