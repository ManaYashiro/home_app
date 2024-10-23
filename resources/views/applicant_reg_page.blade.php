<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight font-color-r">
            {{ __('Applicant Registration Page') }}
        </h2>
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
                                            <label for="">ユーザーID</label>
                                            <span><!-- {{ $userId ?? 'データがありません' }} --></span>
                                        </div>

                                        <div class="mb-4">
                                            <label for="">名前</label>
                                            <span><!-- {{ $name ?? 'データがありません' }} --></span>
                                        </div>

                                        <div class="mb-4">
                                            <label for="">ユーザー名</label>
                                            <span><!-- {{ $userName ?? 'データがありません' }} --></span>
                                        </div>

                                        <div class="mb-4">
                                            <label for="">メールアドレス</label>
                                            <span><!-- {{ $email ?? 'データがありません' }} --></span>
                                        </div>

                                        <div class="mb-4">
                                            <label for="">国</label>
                                            <span><!-- {{ $country ?? 'データがありません' }} --></span>
                                        </div>

                                        <div class="mb-4">
                                            <label for="">年齢</label>
                                            <span><!-- {{ $age ?? 'データがありません' }} --></span>
                                        </div>

                                        <div class="mb-4">
                                            <label for="">日本語レベル</label>
                                            <span><!-- {{ $jpnLevel ?? 'データがありません' }} --></span>
                                        </div>
                                    </div>

                                    <!-- 右ブロック -->
                                    <div class="flex flex-col">
                                        <div class="mb-4">
                                            <label for="">名前カナ</label>
                                            <span><!-- {{ $kana ?? 'データがありません' }} --></span>
                                        </div>

                                        <div class="mb-4">
                                            <label for="">パスワード</label>
                                            <span><!-- {{ $password ?? 'データがありません' }} --></span>
                                        </div>

                                        <div class="mb-4">
                                            <label for="">言語</label>
                                            <span><!-- {{ $language ?? 'データがありません' }} --></span>
                                        </div>

                                        <div class="mb-4">
                                            <label for="">性別</label>
                                            <span><!-- {{ $gender ?? 'データがありません' }} --></span>
                                        </div>

                                        <div class="mb-4">
                                            <label for="">ライブレッスン</label>
                                            <span><!-- {{ $liveLesson ?? 'データがありません' }} --></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- 在留資格認定証明書交付申請書類関係 -->
                    <div class="mt-8">
                        <h2 class="text-lg font-semibold font-color-y">在留資格認定証明書交付申請書類関係</h2>
                        <div class="flex mt-4">
                            <!-- 左ブロック -->
                            <div class="w-1/2 pr-2 flex flex-col justify-between">
                                <div class="mb-4">
                                    <label for="residencyCertificateApplication">在留資格認定証明書交付申請書</label>
                                </div>
                                <div class="mb-4">
                                    <label for="proofPhoto">証明写真</label>
                                </div>
                                <div class="mb-4">
                                    <label for="applicationForm">アプリケーションフォーム</label>
                                </div>
                                <div class="mb-4">
                                    <label for="passport">パスポート</label>
                                </div>
                                <div class="mb-4">
                                    <label for="universityGraduationCertificate">大学修了証</label>
                                </div>
                                <div class="mb-4">
                                    <label for="universityCredits">大学取得単位表</label>
                                </div>
                                <div class="mb-4">
                                    <label for="previousEnrollmentCertificate">過去の在学証明書</label>
                                </div>
                            </div>
                            <!-- 右ブロック -->
                            <div class="w-1/2 pl-2 flex flex-col justify-between">
                                <div class="mb-4 flex justify-between items-center">
                                    <x-input-file id="residencyCertificateApplication" name="residencyCertificateApplication" required class="flex-1" />
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
                                        <a href="#" class="ml-2 text-gray-200 hover:text-gray-500" title="削除">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="mb-4 flex justify-between items-center">
                                    <x-input-file id="universityGraduationCertificate" name="universityGraduationCertificate" required class="flex-1" />
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
                                    <x-input-file id="universityCredits" name="universityCredits" required class="flex-1" />
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
                                    <x-input-file id="previousEnrollmentCertificate" name="previousEnrollmentCertificate" required class="flex-1" />
                                    <div class="flex items-center ml-2">
                                        <a href="#" class="text-gray-200 hover:text-gray-500" title="ダウンロード">
                                            <i class="fas fa-download"></i>
                                        </a>
                                        <a href="#" class="ml-2 text-gray-200 hover:text-gray-500" title="削除">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- ビザ申請書類関係 -->
                    <div class="mt-8">
                        <h2 class="text-lg font-semibold font-color-y">ビザ申請書類関係</h2>
                        <div class="flex mt-4">
                            <!-- 左ブロック -->
                            <div class="w-1/2 pr-2 flex flex-col justify-between">
                                <div class="mb-4">
                                    <label for="residencyCertificate">在留資格認定証明書(メール通知)</label>
                                </div>
                                <div class="mb-4">
                                    <label for="practicalTrainingNotification">実務者研修通知書(通常雇用計画書の代わり)</label>
                                </div>
                            </div>
                            <!-- 右ブロック -->
                            <div class="w-1/2 pl-2 flex flex-col justify-between">
                                <div class="mb-4">
                                    <x-input-file id="residencyCertificate" name="residencyCertificate" required />
                                </div>
                                <div class="mb-4">
                                    <x-input-file id="practicalTrainingNotification"
                                        name="practicalTrainingNotification" required />
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- 入国後書類関係 -->
                    <div class="mt-8">
                        <h2 class="text-lg font-semibold font-color-y">入国後書類関係</h2>
                        <div class="flex mt-4">
                            <!-- 左ブロック -->
                            <div class="w-1/2 pr-2 flex flex-col justify-between">
                                <div class="mb-4">
                                    <label for="residencyCard">在留カード</label>
                                </div>
                                <div class="mb-4">
                                    <label for="residentCertificate">住民票</label>
                                </div>
                                <div class="mb-4">
                                    <label for="nationalHealthInsurance">国民健康保険証</label>
                                </div>
                                <div class="mb-4">
                                    <label for="pensionBook">年金手帳</label>
                                </div>
                                <div class="mb-4">
                                    <label for="bankBook">通帳</label>
                                </div>
                                <div class="mb-4">
                                    <label for="myNumberCard">マイナンバーカード</label>
                                </div>
                            </div>
                            <!-- 右ブロック -->
                            <div class="w-1/2 pl-2 flex flex-col justify-between">
                                <div class="mb-4">
                                    <x-input-file id="residencyCard" name="residencyCard" required />
                                </div>
                                <div class="mb-4">
                                    <x-input-file id="residentCertificate" name="residentCertificate" required />
                                </div>
                                <div class="mb-4">
                                    <x-input-file id="nationalHealthInsurance" name="nationalHealthInsurance"
                                        required />
                                </div>
                                <div class="mb-4">
                                    <x-input-file id="pensionBook" name="pensionBook" required />
                                </div>
                                <div class="mb-4">
                                    <x-input-file id="bankBook" name="bankBook" required />
                                </div>
                                <div class="mb-4">
                                    <x-input-file id="myNumberCard" name="myNumberCard" required />
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- 面接・就職書類関係 -->
                    <div class="mt-8">
                        <h2 class="text-lg font-semibold font-color-y">面接・就職書類関係</h2>
                        <div class="flex mt-4">
                            <!-- 左ブロック -->
                            <div class="w-1/2 pr-2 flex flex-col justify-between">
                                <div class="mb-4">
                                    <label for="resume">履歴書</label>
                                </div>
                                <div class="mb-4">
                                    <label for="license">運転免許証</label>
                                </div>
                                <div class="mb-4">
                                    <label for="qualificationCertificate">各種資格証明書</label>
                                </div>
                                <div class="mb-4">
                                    <label for="trainingCompletionCertificateRinxs">研修終了証(RINXs)</label>
                                </div>
                                <div class="mb-4">
                                    <label for="trainingCompletionCertificateNexus">研修終了証(ネクサス)</label>
                                </div>
                                <div class="mb-4">
                                    <label for="movingOutCertificate">転出証明書</label>
                                </div>
                                <div class="mb-4">
                                    <label for="nationalHealthInsuranceWithdrawalCertificate">国民健康保険脱退証明書</label>
                                </div>
                                <div class="mb-4">
                                    <label for="nationalPensionWithdrawalCertificate">国民年金脱退証明書</label>
                                </div>
                                <div class="mb-4">
                                    <label for="movingInProcedure">転入手続(在留カード裏面)</label>
                                </div>
                                <div class="mb-4">
                                    <label for="newAddressNationalHealthInsurance">新住所での国民健康保険証</label>
                                </div>
                                <div class="mb-4">
                                    <label for="newAddressNationalPensionBook">新住所での国民年金手帳</label>
                                </div>
                            </div>
                            <!-- 右ブロック -->
                            <div class="w-1/2 pl-2 flex flex-col justify-between">
                                <div class="mb-4">
                                    <x-input-file id="resume" name="resume" required />
                                </div>
                                <div class="mb-4">
                                    <x-input-file id="license" name="license" required />
                                </div>
                                <div class="mb-4">
                                    <x-input-file id="qualificationCertificate" name="qualificationCertificate"
                                        required />
                                </div>
                                <div class="mb-4">
                                    <x-input-file id="trainingCompletionCertificateRinxs"
                                        name="trainingCompletionCertificateRinxs" required />
                                </div>
                                <div class="mb-4">
                                    <x-input-file id="trainingCompletionCertificateNexus"
                                        name="trainingCompletionCertificateNexus" required />
                                </div>
                                <div class="mb-4">
                                    <x-input-file id="movingOutCertificate" name="movingOutCertificate" required />
                                </div>
                                <div class="mb-4">
                                    <x-input-file id="nationalHealthInsuranceWithdrawalCertificate"
                                        name="nationalHealthInsuranceWithdrawalCertificate" required />
                                </div>
                                <div class="mb-4">
                                    <x-input-file id="nationalPensionWithdrawalCertificate"
                                        name="nationalPensionWithdrawalCertificate" required />
                                </div>
                                <div class="mb-4">
                                    <x-input-file id="movingInProcedure" name="movingInProcedure" required />
                                </div>
                                <div class="mb-4">
                                    <x-input-file id="newAddressNationalHealthInsurance"
                                        name="newAddressNationalHealthInsurance" required />
                                </div>
                                <div class="mb-4">
                                    <x-input-file id="newAddressNationalPensionBook"
                                        name="newAddressNationalPensionBook" required />
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
