<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight font-color-r">
            {{ __('Applicant Page') }}
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
                <div class="p-6 text-gray-900">
                    <div>
                        <x-input-label for="cohortName" :value="__('applicant_page.cohortName')" />
                        <x-select id="cohortName" class="block mt-1 w-full" name="cohortName" :options="['Cohort 1' => 'Cohort 1', 'Cohort 2' => 'Cohort 2', 'Cohort 3' => 'Cohort 3']"
                            required />
                        <x-input-error :messages="$errors->get('cohortName')" class="mt-2" />
                    </div>

                    <div class="mt-6">
                        <h3 class="font-semibold text-lg text-gray-800 mb-4 font-color-y">{{ __('User Information') }}
                        </h3>
                        <table class="min-w-full border-collapse border border-gray-300">
                            <thead>
                                <tr>
                                    <th class="border border-gray-300 p-4">{{ __('applicant_page.userName') }}</th>
                                    <th class="border border-gray-300 p-4">{{ __('applicant_page.name') }}</th>
                                    <th class="border border-gray-300 p-4">{{ __('applicant_page.kana') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @foreach ($users as $user)
                                    <tr>
                                        <td class="border border-gray-300 p-4">{{ $user->username }}</td>
                                        <td class="border border-gray-300 p-4">{{ $user->name }}</td>
                                        <td class="border border-gray-300 p-4">{{ $user->kana }}</td>
                                    </tr>
                                @endforeach --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
