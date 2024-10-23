<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight font-color-r">
            {{ __('Menu') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 flex-column">
                    <!-- フォーム開始 -->
                    <form method="POST" action="{{ route('cohorts.store') }}">
                        @csrf <!-- CSRFトークンの追加 -->

                        <div>
                            <x-input-label for="cohortName" :value="__('期登録')" />
                            <x-text-input id="cohortName" class="block mt-1 w-full" type="text" name="cohortName"
                                :value="old('cohortName')" required autofocus />
                            <x-input-error :messages="$errors->get('cohortName')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="appCeoDate" :value="__('在留資格認定証明書交付申請日')" />
                            <x-text-input id="appCeoDate" class="block mt-1 w-full" type="date" name="appCeoDate"
                                :value="old('appCeoDate')" required />
                            <x-input-error :messages="$errors->get('appCeoDate')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="appVisaDate" :value="__('ビザ申請日')" />
                            <x-text-input id="appVisaDate" class="block mt-1 w-full" type="date"
                                name="applicationVisaDate" :value="old('appVisaDate')" required />
                            <x-input-error :messages="$errors->get('appVisaDate')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="JpnLangStudyStartDate" :value="__('日本語学習開始日')" />
                            <x-text-input id="JpnLangStudyStartDate" class="block mt-1 w-full" type="date"
                                name="JpnLangStudyStartDate" :value="old('JpnLangStudyStartDate')" required />
                            <x-input-error :messages="$errors->get('JpnLangStudyStartDate')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="JpnLangStudyEndDate" :value="__('日本語学習終了日')" />
                            <x-text-input id="JpnLangStudyEndDate" class="block mt-1 w-full" type="date"
                                name="JpnLangStudyEndDate" :value="old('JpnLangStudyEndDate')" required />
                            <x-input-error :messages="$errors->get('JpnLangStudyEndDate')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="dateOfEntry" :value="__('入国日')" />
                            <x-text-input id="dateOfEntry" class="block mt-1 w-full" type="date" name="dateOfEntry"
                                :value="old('dateOfEntry')" required />
                            <x-input-error :messages="$errors->get('dateOfEntry')" class="mt-2" />
                        </div>

                        <!-- 登録ボタン -->
                        <div class="mt-6">
                            <x-primary-button class="ml-4">
                                {{ __('登録') }}
                            </x-primary-button>
                        </div>
                    </form>
                    <!-- フォーム終了 -->
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
