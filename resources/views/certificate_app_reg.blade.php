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
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 flex-column">
                    <div class="mt-4">
                        <x-input-label for="cohortName" :value="__('certificate_app_reg.cohortName')" />
                        <x-select id="cohortName" class="block mt-1 w-full" name="cohortName" :options="['Cohort 1' => 'Cohort 1', 'Cohort 2' => 'Cohort 2', 'Cohort 3' => 'Cohort 3']"
                            required />
                        <x-input-error :messages="$errors->get('cohortName')" class="mt-2" />
                    </div>
                    <div class="mt-4">
                        <x-input-label for="name" :value="__('certificate_app_reg.name')" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                            :value="old('name')" required />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>
                    <div class="mt-4">
                        <x-input-label for="kana" :value="__('certificate_app_reg.kana')" />
                        <x-text-input id="kana" class="block mt-1 w-full" type="text" name="kana"
                            :value="old('kana')" required />
                        <x-input-error :messages="$errors->get('kana')" class="mt-2" />
                    </div>
                    <div class="mt-4">
                        <x-input-label for="userName" :value="__('certificate_app_reg.userName')" />
                        <x-text-input id="userName" class="block mt-1 w-full" type="text" name="userName"
                            :value="old('userName')" required />
                        <x-input-error :messages="$errors->get('userName')" class="mt-2" />
                    </div>
                    <div class="mt-4">
                        <x-input-label for="passWord" :value="__('certificate_app_reg.passWord')" />
                        <x-text-input id="passWord" class="block mt-1 w-full" type="text" name="passWord"
                            :value="old('passWord')" required />
                        <x-input-error :messages="$errors->get('passWord')" class="mt-2" />
                    </div>
                    <div class="mt-4">
                        <x-input-label for="mailAddress" :value="__('certificate_app_reg.mailAddress')" />
                        <x-text-input id="mailAddress" class="block mt-1 w-full" type="text" name="mailAddress"
                            :value="old('mailAddress')" required />
                        <x-input-error :messages="$errors->get('mailAddress')" class="mt-2" />
                    </div>
                    <div class="mt-4">
                        <x-input-label for="country" :value="__('certificate_app_reg.country')" />
                        <x-select id="country" class="block mt-1 w-full" name="country" :options="[
                            '' => '選択してください',
                            'スリランカ' => 'スリランカ',
                        ]" required />
                        <x-input-error :messages="$errors->get('country')" class="mt-2" />
                    </div>
                    <div class="mt-4">
                        <x-input-label for="language" :value="__('certificate_app_reg.language')" />
                        <x-select id="language" class="block mt-1 w-full" name="language" :options="[
                            '' => '選択してください',
                            'スリランカ' => 'スリランカ',
                        ]"
                            required />
                        <x-input-error :messages="$errors->get('language')" class="mt-2" />
                    </div>
                    <div class="mt-4">
                        <x-input-label for="age" :value="__('certificate_app_reg.age')" />
                        <x-text-input id="age" class="block mt-1 w-full" type="text" name="age"
                            :value="old('age')" required />
                        <x-input-error :messages="$errors->get('age')" class="mt-2" />
                    </div>
                    <div class="mt-4">
                        <x-input-label for="gender" :value="__('certificate_app_reg.gender')" />
                        <x-select id="gender" class="block mt-1 w-full" name="gender" :options="[
                            '' => '選択してください',
                            'male' => '男性',
                            'female' => '女性',
                            'other' => 'その他',
                        ]" required />
                        <x-input-error :messages="$errors->get('gender')" class="mt-2" />
                    </div>
                    <div class="mt-4">
                        <x-input-label for="jpnLangProficiency" :value="__('certificate_app_reg.jpnLangProficiency')" />
                        <x-select id="jpnLangProficiency" class="block mt-1 w-full" name="jpnLangProficiency"
                            :options="[
                                '' => '選択してください',
                                'N1' => 'N1',
                                'N2' => 'N2',
                                'N3' => 'N3',
                                'N4' => 'N4',
                                'N5' => 'N5',
                            ]" required />
                        <x-input-error :messages="$errors->get('jpnLangProficiency')" class="mt-2" />
                    </div>
                    <div class="mt-4">
                        <x-input-label for="liveLessonClass" :value="__('certificate_app_reg.liveLessonClass')" />
                        <x-text-input id="liveLessonClass" class="block mt-1 w-full" type="text"
                            name="liveLessonClass" :value="old('liveLessonClass')" required />
                        <x-input-error :messages="$errors->get('liveLessonClass')" class="mt-2" />
                    </div>

                    <div class="mt-6">
                        <x-primary-button class="ml-4">
                            {{ __('certificate_app_reg.register') }}
                        </x-primary-button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
