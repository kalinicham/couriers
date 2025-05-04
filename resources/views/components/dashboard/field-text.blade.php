@props([
    'name',
    'label' => '',
    'value' => '',
    'required' => false,
])


<div class="mb-4">
    @if ($label)
        <label for="{{ $name }}" class="block text-sm font-medium text-gray-700">
            {{ $label }}
        </label>
    @endif

    <input type="text" name="{{ $name }}" id="{{ $name }}" value="{{ old($name, $value) }}"  @if($required) required @endif
        {{ $attributes->merge(['class' => 'w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500'])}}
    >
</div>
