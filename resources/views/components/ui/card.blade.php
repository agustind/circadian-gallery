<!-- Article -->
@props([
    'name' => '',
    'thumb' => '',
])
<article class="overflow-hidden bg-white rounded-lg shadow-md">

    <img alt="Placeholder" class="block h-auto w-full" src="/{{ $thumb }}">
    
    <header class="flex items-center justify-between leading-tight p-2 md:p-4">
        <h2 class="text-lg">{{ $name }}&nbsp;</h2>
        <p class="text-green-300 text-sm">
            {{-- 14/4/19 --}}
        </p>
    </header>
    
</article>
<!-- END Article -->