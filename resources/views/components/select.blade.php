@props([
    'values' => [],
    'id' => '',
    'name' => '',
    'label' => '',
    'multiple' => false,
])

@if(!empty($label))
    <label for="{{ $id }}"
        class="block text-sm font-medium leading-5 text-gray-700">{{ $label }}
    </label>
@endif

<select id="{{ $id }}" name="{{ $name }}" @if($multiple) multiple @endif {{ $attributes->merge(['class' => 'mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm']) }}>
    {{ $slot }}
</select>