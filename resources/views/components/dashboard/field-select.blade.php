@props([
    'name',
    'label' => '',
    'options' => [],
    'value' => '',
    'required' => false,
    'placeholder' => null,
])

<div class="mb-4">
    @if ($label)
        <label for="{{ $name }}" class="block text-sm font-medium text-gray-700">
            {{ $label }}
        </label>
    @endif

    <select name="{{ $name }}" id="{{ $name }}" @if($required) required @endif
        {{ $attributes->merge(['class' => 'w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500']) }}
    >
        @if($placeholder)
            <option value="" disabled {{ old($name, $value) === '' ? 'selected' : '' }}>
                {{ $placeholder }}
            </option>
        @endif

        @foreach($options as $optionValue => $optionLabel)
            <option value="{{ $optionValue }}" {{ old($name, $value) == $optionValue ? 'selected' : '' }}>
                {{ $optionLabel }}
            </option>
        @endforeach
    </select>
</div>
