<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight font-color-r">
            {{ __('Certificate Application Registration') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 flex-column">
                    <div class="mt-4">
                        <x-input-label for="cohortName" :value="__('期名称')" />
                        <x-select id="cohortName" class="block mt-1 w-full" name="cohortName" :options="['Cohort 1' => 'Cohort 1', 'Cohort 2' => 'Cohort 2', 'Cohort 3' => 'Cohort 3']" required />
                        <x-input-error :messages="$errors->get('cohortName')" class="mt-2" />
                    </div>
                    <div class="mt-4">
                        <x-input-label for="name" :value="__('名前')" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text"
                            name="name" :value="old('name')" required />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>
                    <div class="mt-4">
                        <x-input-label for="kana" :value="__('名前カナ')" />
                        <x-text-input id="kana" class="block mt-1 w-full" type="text"
                            name="kana" :value="old('kana')" required />
                        <x-input-error :messages="$errors->get('kana')" class="mt-2" />
                    </div>
                    <div class="mt-4">
                        <x-input-label for="userName" :value="__('ユーザー名')" />
                        <x-text-input id="userName" class="block mt-1 w-full" type="text"
                            name="userName" :value="old('userName')" required />
                        <x-input-error :messages="$errors->get('userName')" class="mt-2" />
                    </div>
                    <div class="mt-4">
                        <x-input-label for="passWord" :value="__('パスワード')" />
                        <x-text-input id="passWord" class="block mt-1 w-full" type="text"
                            name="passWord" :value="old('passWord')" required />
                        <x-input-error :messages="$errors->get('passWord')" class="mt-2" />
                    </div>
                    <div class="mt-4">
                        <x-input-label for="mailAddress" :value="__('メールアドレス')" />
                        <x-text-input id="mailAddress" class="block mt-1 w-full" type="text" name="mailAddress"
                            :value="old('mailAddress')" required />
                        <x-input-error :messages="$errors->get('mailAddress')" class="mt-2" />
                    </div>
                    <div class="mt-4">
                        <x-input-label for="country" :value="__('国')" />
                        <x-text-input id="country" class="block mt-1 w-full" type="text" name="country"
                            :value="old('country')" required />
                        <x-input-error :messages="$errors->get('country')" class="mt-2" />
                    </div>
                    <div class="mt-4">
                        <x-input-label for="language" :value="__('言語')" />
                        <x-text-input id="language" class="block mt-1 w-full" type="text" name="language"
                            :value="old('language')" required />
                        <x-input-error :messages="$errors->get('language')" class="mt-2" />
                    </div>
                    <div class="mt-4">
                        <x-input-label for="age" :value="__('年齢')" />
                        <x-text-input id="age" class="block mt-1 w-full" type="text" name="age"
                            :value="old('age')" required />
                        <x-input-error :messages="$errors->get('age')" class="mt-2" />
                    </div>
                    <div class="mt-4">
                        <x-input-label for="gender" :value="__('性別')" />
                        <x-select id="gender" class="block mt-1 w-full" name="gender" :options="[
                            '' => '選択してください', 'male' => '男性', 'female' => '女性', 'other' => 'その他'
                            ]" required />
                        <x-input-error :messages="$errors->get('gender')" class="mt-2" />
                    </div>
                    <div class="mt-4">
                        <x-input-label for="JpnLangProficiency" :value="__('日本語レベル')" />
                        <x-select id="JpnLangProficiency" class="block mt-1 w-full" name="JpnLangProficiency" :options="[
                            '' => '選択してください', 'N1' => 'N1', 'N2' => 'N2', 'N3' => 'N3', 'N4' => 'N4', 'N5' => 'N5'
                        ]" required />
                        <x-input-error :messages="$errors->get('JpnLangProficiency')" class="mt-2" />
                    </div>
                    <div class="mt-4">
                        <x-input-label for="liveLessonClass" :value="__('ライブレッスンクラス')" />
                        <x-text-input id="liveLessonClass" class="block mt-1 w-full" type="text" name="liveLessonClass"
                            :value="old('liveLessonClass')" required />
                        <x-input-error :messages="$errors->get('liveLessonClass')" class="mt-2" />
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
