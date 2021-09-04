@props([
    'href' => '#',
    'label' => '',
    'type' => 'link',
    'secondary' => false,
])
@php
    $classes = 'justify-center py-2 text-center px-4 border border-transparent leading-5 font-medium rounded-md focus:outline-none transition duration-200 ease-in-out';
    if(!$secondary)
        $classes .= ' focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 text-white bg-black hover:bg-black';
    else
        $classes .= ' focus:border-indigo-700 focus:shadow-outline-gray active:bg-gray-700 text-gray-600 bg-gray-300 hover:bg-gray-200';
@endphp


@if($type == 'submit')
    <button type="submit" {{ $attributes->merge(['class' => $classes]) }}>
        {{ $label }}
    </button>
@else
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
        {{ $label }}
    </a>
@endif
