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
                    <form method="GET" action="{{ route('applicantPage.index') }}">
                        <div class="mt-4">
                            @php
                                $options = array_merge(
                                    ['' => __('certificate_app_reg.select')],
                                    $cohorts->pluck('cohort_name', 'cohort_name')->toArray(),
                                );
                                // リクエストから選択されたコホート名を取得
                                $selectedCohort = request('cohort_name');
                            @endphp
                            <x-input-label for="cohort_name" :value="__('certificate_app_reg.cohort_name')" />
                            {{-- <x-select>コンポーネントでは選択された値を維持できないため <select>を使用 --}}
                            <select id="cohort_name" name="cohort_name"
                                class="block mt-1 w-full border-gray-300 rounded-md" onchange="this.form.submit()">
                                @foreach ($options as $value => $label)
                                    <option value="{{ $value }}"
                                        {{ $value == $selectedCohort ? 'selected' : '' }}>
                                        {{ $label }}
                                    </option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('cohort_name')" class="mt-2" />
                        </div>
                    </form>
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
                                @foreach ($users as $user)
                                    <tr onclick="window.location='{{ route('applicant.registration', $user->id) }}'"
                                        style="cursor: pointer;">
                                        <td class="border border-gray-300 p-4">{{ $user->username }}</td>
                                        <td class="border border-gray-300 p-4">{{ $user->name }}</td>
                                        <td class="border border-gray-300 p-4">{{ $user->name_kana }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
