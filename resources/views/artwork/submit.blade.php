<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Artwork') }}
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    
                    
                    <form action="/artwork" method="POST">

                        <div class="max-w-md">

                            @csrf

                            <input type="hidden" name="submission_id" value="" />
                            
                            <div>
                                <x-text-input name="name" label="Piece title" />
                            </div>

                            <div class="mt-12">
                                <div class="uploader">
                                    <div class="drop"></div>
                                    <div class="progress mt-4"></div>
                                </div>
                            </div>

                            <div class="mt-12 mb-12 text-right">
                                <x-button class="btn-submit hidden">Submit piece</x-button>
                            </div>

                        </div>

                    </form>

                    
                </div>
            </div>
            
        </div>

    </div>
</x-app-layout>
