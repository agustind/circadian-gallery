@props([
    'status' => 'success'
])
@php
    $classes = 'bg-green-100 text-green-800';
    if($status == 'inactive') $classes = 'bg-gray-200 text-gray-500';
    if($status == 'error') $classes = 'bg-red-100 text-red-800';
    if($status == 'warning') $classes = 'bg-yellow-100 text-yellow-500';
    
@endphp
<span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $classes }}">{{ $slot }}</span>