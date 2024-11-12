@php
    $filename = $alldata['filename'];
    $data = $alldata['data'];
    $upload = $alldata['upload'];
@endphp

<div class="w-1/2 flex justify-between items-center">
    <x-input-file id="{{ $filename }}_file_input" name="{{ $filename }}" class="flex-1" />
    <input type="hidden" id="{{ $filename }}_hidden" name="{{ $filename }}_hidden" value="{{ $data }}" />
    @if (isset($data) && $data)
        @php
            $label = \App\Helpers\CustomHelper::trimFilename($data, $upload);
        @endphp
        <label id="{{ $filename }}" class="font-size8">{{ $label }}</label>
    @endif
    <div class="flex items-center ml-2">
        <a href="javascript:void(0)" id="{{ $filename }}_download" class="text-gray-200 hover:text-gray-500"
            data-filename="{{ $data }}" title="Download">
            <i class="fas fa-download"></i>
        </a>
        <a href="#" id="{{ $filename }}_resetFile" class="ml-2 text-gray-200 hover:text-gray-500"
            title="Delete">
            <i class="fas fa-trash"></i>
        </a>
    </div>
</div>
