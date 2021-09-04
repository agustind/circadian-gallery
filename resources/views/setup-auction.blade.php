<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Setup auction') }}
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            

                    <div class="grid grid-cols-4 gap-8">
                        @foreach($submissions as $submission)
                                        
                            <div>
                               
                                    <article class="overflow-hidden bg-white rounded-lg shadow-md">

                                        <img alt="Placeholder" class="block h-auto w-full" src="/{{ $submission->file }}">
                                    
                                        <header class="items-center justify-between leading-tight p-2 md:p-4">
                                            <h2 class="text-lg">{{ $submission->name }}&nbsp;</h2>
                                            @if($submission->in_auction == 1)
                                                <x-ui.pill>currently in auction</x-ui-pill>
                                            @else
                                                <small>auctioning on {{ $submission->auctioning_at->format('d/m/Y') }}</small>
                                            @endif
                                            <div class="mt-4 border-t pt-4">
                                                <x-profile :user="$submission->user" />
                                            </div>
                                        </header>
                                        
                                    </article>

                             
                            </div>   

                        @endforeach
                    </div>

                    
              
            
        </div>


        

    </div>
</x-app-layout>
