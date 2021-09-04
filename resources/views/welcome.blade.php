<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Circadian Gallery</title>

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/intro.css') }}">
        <link rel="icon" type="image/png" href="/images/favicon.png" />
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="antialiased intro-page">

        <div class="intro-teaser">
            <a href="#" class="header-scroll-hint">↓</a>
        </div>

        <div class="intro-container">

            <div class="intro-logo"></div>

            <div class="intro-copy">
                <p>A new single-edition curated NFT auction every 24 hours. No minting or listing fees.<br>
                    Your art under the spotlight for 24hs for collectors to fight over it.</p>
            </div>


            <h2>Ready to join us?</h2>
            
            
            <div class="intro-signup-form-container">
                <div class="intro-signup-form">
                    
                    <div>
                        <input type="text" class="signup-name" placeholder="Your name" required />
                    </div>

                    <div>
                        <input type="email" class="signup-email" placeholder="Your email" required />
                    </div>
                    
                    <div>
                        <input type="text" class="signup-social" placeholder="Social links" />
                    </div>
                    
                    <div>
                        <input type="text" class="signup-work" placeholder="Links to your work" required />
                    </div>

                    <a href="#" class="intro-signup-send">Send</a>

                </div>
                <div class="thankyou">
                    We’ll get back to you soon!
                </div>
            </div>
            


            
        </div>

        
        

    </body>
</html>
