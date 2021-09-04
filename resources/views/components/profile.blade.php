@props([
    'user'
])
<div>
    <div class="flex items-center">
        <img class="w-10 h-10 rounded-full mr-2" src="https://pbs.twimg.com/profile_images/885868801232961537/b1F6H4KC_400x400.jpg">
        <div class="text-sm">
        <p class="text-black leading-none font-bold">{{ $user->name }}</p>
        <p class="text-grey-dark mt-1">{{ $user->country }}</p>
        </div>
    </div>
</div>