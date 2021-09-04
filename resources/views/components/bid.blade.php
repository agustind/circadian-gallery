@props([
    'address' => '', 
    'value' => ''
])
<div class="bid grid grid-cols-2 mb-6">
    <div>
        {{ $address }}
    </div>
    <div class="text-right font-bold">
        <div style="font-family: monospace; font-size: 1.4em">Ξ {{ $value }}</div>
    </div>
</div>