<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <div class="mb-12 text-right">
                        <x-btn href="/profile" label="Save profile" />
                    </div>
                    
                    <div class="max-w-md">
                        <div>
                            <x-text-input label="Your name" />
                        </div>
                        <div class="mt-4">
                            <x-text-input label="Your email" />
                        </div>
                        <div class="mt-12">
                            <x-text-input label="Instagram" />
                        </div>
                        <div class="mt-4">
                            <x-text-input label="Twitter" />
                        </div>
                        <div class="mt-4">
                            <x-text-input label="Behance" />
                        </div>

                    </div>

                    
                </div>
            </div>
            
        </div>


        

    </div>
</x-app-layout>
