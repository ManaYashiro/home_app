@php
    $filename = $alldata['filename'];
    $data = $alldata['data'];
    $upload = $alldata['upload'];
@endphp

<div class="w-1/2 flex justify-between items-center">
    <x-input-file name="{{ $filename }}" class="flex-1" />
    @if (isset($data) && $data)
        @php
            $data = \App\Helpers\CustomHelper::trimFilename($data, $upload);
            \Log::info('Data value:', ['data' => $data]);
        @endphp
        <label id="{{ $filename }}" class="font-size8">{{ $data }}</label>

        <input type="hidden" id="{{ $filename }}" name="{{ $filename }}" class="flex-1" />
    @endif
    <div class="flex items-center ml-2">
        <a href="#" id="{{ $filename }}_download" class="text-gray-200 hover:text-gray-500" title="Download">
            <i class="fas fa-download"></i>
        </a>
        <a href="#" id="{{ $filename }}_resetFile" class="ml-2 text-gray-200 hover:text-gray-500"
            title="Delete">
            <i class="fas fa-trash"></i>
        </a>
    </div>
</div>
