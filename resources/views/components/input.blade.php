@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'rounded-md outline-none bg-gray-200 py-2 px-2 shadow-sm border-gray-300 focus:ring focus:ring-gray-600 focus:ring-opacity-50']) !!}>

