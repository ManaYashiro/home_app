<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight font-color-r">
            {{ __('Cohort Registration') }}
        </h2>
        <div class="flex space-x-2 mt-2">
            @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                <a href="{{ route('locale.switch', ['locale' => $localeCode]) }}"
                    class="font-color-g">{{ $properties['native'] }}</a>
                @if (!$loop->last)
                    <span class="mx-5">|</span>
                @endif
            @endforeach
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
                <div id="success-message" class="bg-color-g text-white py-2 px-4 rounded-md mb-4">
                    {{ session('success') }}
                </div>
            @endif
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 flex-column">
                    <!-- フォーム開始 -->
                    <form method="POST" action="{{ route('cohorts.store') }}">
                        @csrf <!-- CSRFトークンの追加 -->
                        <div>
                            <x-input-label for="cohortName" :value="__('cohort_reg.cohortRegistration')" />
                            <x-text-input id="cohortName" class="block mt-1 w-full" type="text" name="cohortName"
                                :value="old('cohortName')" autofocus />
                            <x-input-error :messages="$errors->get('cohortName')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="appCeoDate" :value="__('cohort_reg.appCeoDate')" />
                            <x-text-input id="appCeoDate" class="block mt-1 w-full" type="date" name="appCeoDate"
                                :value="old('appCeoDate')" />
                            <x-input-error :messages="$errors->get('appCeoDate')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="appVisaDate" :value="__('cohort_reg.appVisaDate')" />
                            <x-text-input id="appVisaDate" class="block mt-1 w-full" type="date" name="appVisaDate"
                                :value="old('appVisaDate')" />
                            <x-input-error :messages="$errors->get('appVisaDate')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="jpnLangStudyStartDate" :value="__('cohort_reg.jpnLangStudyStartDate')" />
                            <x-text-input id="jpnLangStudyStartDate" class="block mt-1 w-full" type="date"
                                name="jpnLangStudyStartDate" :value="old('jpnLangStudyStartDate')" />
                            <x-input-error :messages="$errors->get('jpnLangStudyStartDate')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="jpnLangStudyEndDate" :value="__('cohort_reg.jpnLangStudyEndDate')" />
                            <x-text-input id="jpnLangStudyEndDate" class="block mt-1 w-full" type="date"
                                name="jpnLangStudyEndDate" :value="old('jpnLangStudyEndDate')" />
                            <x-input-error :messages="$errors->get('jpnLangStudyEndDate')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="dateOfEntry" :value="__('cohort_reg.dateOfEntry')" />
                            <x-text-input id="dateOfEntry" class="block mt-1 w-full" type="date" name="dateOfEntry"
                                :value="old('dateOfEntry')" />
                            <x-input-error :messages="$errors->get('dateOfEntry')" class="mt-2" />
                        </div>

                        <!-- 登録ボタン -->
                        <div class="mt-6">
                            <x-primary-button class="ml-4">
                                {{ __('cohort_reg.register') }}
                            </x-primary-button>
                        </div>
                    </form>
                    <!-- フォーム終了 -->
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
