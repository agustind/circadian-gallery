<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Circadian Gallery</title>

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <script src="https://cdn.ethers.io/lib/ethers-5.0.umd.min.js" type="application/javascript"></script>

        <script>
            var contract_address = '{{ env('CONTRACT_ADDRESS') }}';
            var auction_time_left = {{ strtotime("tomorrow 00:00:00") }}
        </script>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="antialiased">

        @if (Route::has('login'))

            <div class="hidden fixed z-10 top-2 right-0 px-6 py-4 sm:block">
                @auth

                    <a href="{{ url('/dashboard') }}" class="text-gray-700 underline">Dashboard</a>

                @else

                    <x-btn href="{{ route('login') }}" label="Artists login" />
                    
                @endauth
            </div>

        @endif

        <div class="min-h-screen relative">
           
            <h4></h4>     
            
            @if(!empty($submission))
            
                <div class="max-w-3xl mx-auto pt-24">


                    <div class="flex">

                        <div class="pr-4 w-2/3">
                            <h2 class="font-bold text-2xl mb-6">{{ $submission->name }}</h2>
                            <img src="{{ $submission->file }}">
                            <div class="mt-6 mb-6">
                                <b>Non-fungible token</b> (1920x1080px JPEG) This item is unique<br>
                                <b>Contract address:</b> <span class="contract-address"></span>
                            </div>
                            <div class="mt-5">
                                {{ $submission->description }}
                            </div>
                            <div class="mt-8">
                                <x-profile :user=" $submission->user " />
                            </div>
                        </div>
                    
                        <div class="pl-4 w-1/3">
                            
                            <div class="mb-8">
                                <div class="auction-time text-4xl font-bold">00:00:00</div>
                            </div>

                            <div class="mb-8">
                                <x-btn class="btn-bid" label="Place bid" />
                                <div class="current-address mt-4"></div>
                            </div>

                            <div class="bids"></div>
                            
                        </div>

                    </div>
                                    
                </div>   
                
            @else
                No pieces in auction at the moment
            @endif
           
        </div>
        
        <x-ui.bid-modal />

    </body>
</html>
