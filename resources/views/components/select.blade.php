@props(['options' => [], 'value' => null, 'disabled' => false])

<select @disabled($disabled)
    {{ $attributes->merge(['class' => 'border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm']) }}>
    @foreach ($options as $optionValue => $label)
        <option value="{{ $optionValue }}" {{ $optionValue == $value ? 'selected' : '' }}>
            {{ $label }}
        </option>
    @endforeach
</select>
