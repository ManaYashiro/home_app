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
                            <x-input-label for="cohort_name" :value="__('cohort_reg.cohort_name')" />
                            <x-text-input id="cohort_name" class="block mt-1 w-full" type="text" name="cohort_name"
                                :value="old('cohort_name')" autofocus />
                            <x-input-error :messages="$errors->get('cohort_name')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="app_ceo_date" :value="__('cohort_reg.app_ceo_date')" />
                            <x-text-input id="app_ceo_date" class="block mt-1 w-full" type="date" name="app_ceo_date"
                                :value="old('app_ceo_date')" />
                            <x-input-error :messages="$errors->get('app_ceo_date')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="app_visa_date" :value="__('cohort_reg.app_visa_date')" />
                            <x-text-input id="app_visa_date" class="block mt-1 w-full" type="date"
                                name="app_visa_date" :value="old('app_visa_date')" />
                            <x-input-error :messages="$errors->get('app_visa_date')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="jpn_lang_study_start_date" :value="__('cohort_reg.jpn_lang_study_start_date')" />
                            <x-text-input id="jpn_lang_study_start_date" class="block mt-1 w-full" type="date"
                                name="jpn_lang_study_start_date" :value="old('jpn_lang_study_start_date')" />
                            <x-input-error :messages="$errors->get('jpn_lang_study_start_date')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="jpn_lang_study_end_date" :value="__('cohort_reg.jpn_lang_study_end_date')" />
                            <x-text-input id="jpn_lang_study_end_date" class="block mt-1 w-full" type="date"
                                name="jpn_lang_study_end_date" :value="old('jpn_lang_study_end_date')" />
                            <x-input-error :messages="$errors->get('jpn_lang_study_end_date')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="date_of_entry" :value="__('cohort_reg.date_of_entry')" />
                            <x-text-input id="date_of_entry" class="block mt-1 w-full" type="date"
                                name="date_of_entry" :value="old('date_of_entry')" />
                            <x-input-error :messages="$errors->get('date_of_entry')" class="mt-2" />
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
