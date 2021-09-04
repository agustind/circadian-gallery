<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Artwork') }}
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden">
                <div class="p-6">

                    <div class="mb-12 text-right">
                        <x-btn href="/artwork/submit" label="Submit your artwork" />
                    </div>
                    
                    @if(count($submissions) == 0)
                        
                        <div class="text-gray-500 mb-12 text-center">
                            You have no pieces submitted at the moment ...
                        </div>
                    
                    @else
                        <div class="grid grid-cols-4 gap-8">
                            @foreach($submissions as $submission)
                                
                                <div>
                                    <a href="/artwork/{{ $submission->id }}">
                                        <x-ui.card thumb="{{ $submission->file }}" name="{{ $submission->name }}" />
                                    </a>
                                </div>

                            @endforeach
                        </div>
                    @endif
                    
                    

                    
                </div>
            </div>
            
        </div>


        

    </div>
</x-app-layout>
