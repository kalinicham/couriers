@props([
    'name',
    'label' => '',
    'value' => '',
    'required' => false,
    'min' => '18',
    'max' => '60'
])

<div class="mb-4">
    @if ($label)
        <label for="{{ $name }}" class="block text-sm font-medium text-gray-700">
            {{ $label }}
        </label>
    @endif


        <input type="number" name="{{ $name }}" id="{{ $name }}"
               value="{{ old($name, $value) }}"
               @if($required) required @endif
               min="{{ $min }}" max="{{ $max }}"
            {{ $attributes->merge(['class' => 'w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500']) }}
        >
</div>
