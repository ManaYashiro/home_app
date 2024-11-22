<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight font-color-r">
            {{ __('Certificate Application Registration') }}
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
                    <form method="POST" action="{{ route('residencyCertificateApplicants.store') }}">
                        @csrf <!-- CSRFトークンの追加 -->
                        <h3 id="Registrationnew" class="font-semibold text-xl text-gray-800 leading-tight font-color-y"
                            style="display: none">
                            {{ __('certificate_app_reg.new') }}
                        </h3>
                        <h3 id="RegistrationUpdate"
                            class="font-semibold text-xl text-gray-800 leading-tight font-color-y"
                            style="display: none">
                            {{ __('certificate_app_reg.update') }}
                        </h3>
                        <div class="mt-4">
                            @php
                                $options = array_merge(
                                    ['' => __('certificate_app_reg.select')],
                                    $cohorts->pluck('cohort_name', 'cohort_name')->toArray(),
                                );
                            @endphp
                            <div class="flex items-center">
                                <x-input-label for="cohort_name" :value="__('certificate_app_reg.cohort_name')" />
                                <span class="text-red-500 ml-1">*</span>
                            </div>

                            <x-select id="cohort_name" class="block mt-1 w-full" name="cohort_name" :options="$options"
                                :value="old('cohort_name')" />
                            <x-input-error :messages="$errors->get('cohort_name')" class="mt-2 search-error-message" />
                        </div>

                        <div class="mt-4">
                            <div class="flex items-center">
                                <x-input-label for="name" :value="__('certificate_app_reg.name')" />
                                <span class="text-red-500 ml-1">*</span>
                            </div>

                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                                :value="old('name')" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2 search-error-message" />
                        </div>

                        <div class="mt-4">
                            <div class="flex items-center">
                                <x-input-label for="name_kana" :value="__('certificate_app_reg.name_kana')" />
                                <span class="text-red-500 ml-1">*</span>
                            </div>

                            <x-text-input id="name_kana" class="block mt-1 w-full" type="text" name="name_kana"
                                :value="old('name_kana')" />
                            <x-input-error :messages="$errors->get('name_kana')" class="mt-2 search-error-message" />
                        </div>

                        <div class="mt-4">
                            <div class="flex items-center">
                                <x-input-label for="username" :value="__('certificate_app_reg.username')" />
                                <span class="text-red-500 ml-1">*</span>
                            </div>

                            <x-select-user id="select_username_id" class="block mt-1 w-full" name="select_username_id"
                                :options="$options" />
                            <x-text-input id="input_username" class="block mt-1 w-full" type="text" name="username"
                                :value="old('username')" />
                            <x-input-error :messages="$errors->get('username')" class="mt-2 search-error-message" />
                            <x-search-button id="searchButton" class="ml-4 mt-2" disabled>
                                {{ __('certificate_app_reg.search') }}
                            </x-search-button>
                            <x-search-button id="resetButton" class="ml-4 mt-2">
                                {{ __('certificate_app_reg.reset') }}
                            </x-search-button>
                        </div>

                        <div class="mt-4">
                            <div class="flex items-center">
                                <x-input-label for="password" :value="__('certificate_app_reg.password')" />
                                <span class="text-red-500 ml-1">*</span>
                            </div>

                            <x-text-input id="password" class="block mt-1 w-full" type="text" name="password"
                                :value="old('password')" disabled />
                            <x-input-error :messages="$errors->get('password')" class="mt-2 search-error-message" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="email" :value="__('certificate_app_reg.email')" />
                            <x-text-input id="email" class="block mt-1 w-full" type="text" name="email"
                                :value="old('email')" disabled />
                            <x-input-error :messages="$errors->get('email')" class="mt-2 search-error-message" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="country" :value="__('certificate_app_reg.country')" />
                            <x-select id="country" class="block mt-1 w-full" name="country" :options="[
                                '' => __('certificate_app_reg.select'),
                                '1' => __('certificate_app_reg.srilanka'),
                            ]"
                                :value="old('country')" disabled />
                            <x-input-error :messages="$errors->get('country')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="language" :value="__('certificate_app_reg.language')" />
                            <x-select id="language" class="block mt-1 w-full" name="language" :options="[
                                '' => __('certificate_app_reg.select'),
                                '1' => __('certificate_app_reg.srilanka'),
                            ]"
                                :value="old('language')" disabled />
                            <x-input-error :messages="$errors->get('language')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="age" :value="__('certificate_app_reg.age')" />
                            <x-text-input id="age" class="block mt-1 w-full" type="text" name="age"
                                :value="old('age')" disabled />
                            <x-input-error :messages="$errors->get('age')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="gender" :value="__('certificate_app_reg.gender')" />
                            <x-select id="gender" class="block mt-1 w-full" name="gender" :options="[
                                '' => __('certificate_app_reg.select'),
                                '1' => __('certificate_app_reg.male'),
                                '2' => __('certificate_app_reg.female'),
                                '3' => __('certificate_app_reg.other'),
                            ]"
                                :value="old('gender')" disabled />
                            <x-input-error :messages="$errors->get('gender')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="japanese_level" :value="__('certificate_app_reg.japanese_level')" />
                            <x-select id="japanese_level" class="block mt-1 w-full" name="japanese_level"
                                :options="[
                                    '' => __('certificate_app_reg.select'),
                                    'N1' => 'N1',
                                    'N2' => 'N2',
                                    'N3' => 'N3',
                                    'N4' => 'N4',
                                    'N5' => 'N5',
                                ]" :value="old('japanese_level')" disabled />
                            <x-input-error :messages="$errors->get('japanese_level')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="live_class_lesson" :value="__('certificate_app_reg.live_class_lesson')" />
                            <x-text-input id="live_class_lesson" class="block mt-1 w-full" type="text"
                                name="live_class_lesson" :value="old('live_class_lesson')" disabled />
                            <x-input-error :messages="$errors->get('live_class_lesson')" class="mt-2" />
                        </div>

                        <!-- 登録ボタン -->
                        <div class="mt-6">
                            <x-primary-button class="ml-4">
                                {{ __('certificate_app_reg.register') }}
                            </x-primary-button>
                        </div>
                    </form>
                    <!-- フォーム終了 -->
                    <!-- 削除ボタンのための別フォーム -->
                    <form id="delete-certificate-form" action="{{ route('certificate.destroy') }}" method="POST"
                        style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="certificate_name" id="certificate_name_to_delete"
                            value="">

                        <!-- 削除ボタン -->
                        <x-primary-button class="mt-4 text-red-600" id="delete-certificate-button">
                            {{ __('certificate_app_reg.delete') }}
                        </x-primary-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
