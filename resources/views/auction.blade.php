<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;800&display=swap" rel="stylesheet">
    <!--    <link rel = "stylesheet" type = "text / css" href = "jquery.fancybox.min.css">-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" integrity="sha512-H9jrZiiopUdsLpg94A333EfumgUBpO9MdbxStdeITo+KEIMaNfHNvwyjjDJb+ERPaRS6DpyRlKbvPUasNItRyw==" crossorigin="anonymous" />


    <script>
        var contract_address = '{{ env('CONTRACT_ADDRESS') }}';
        var auction_time_left = {{ strtotime("tomorrow 00:00:00") }}
        var scan_url = '{{ env('SCAN_URL') }}';
        var chain_id = '{{ env('CHAIN_ID') }}';
        var chain_name = '{{ env('CHAIN_NAME') }}';
    </script>

    <script src="https://cdn.ethers.io/lib/ethers-5.0.umd.min.js" type="application/javascript"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/front.css">
    <title>Circadian Gallery</title>
</head>

<body>
        
    <div class="wrapper-bg">

        <header class="header pb-0 pb-xl-4">
        <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-light py-0 ml-0 ml-lg-2">
            <a class="navbar-brand p-0" href="/">
    <!--            <div class="logo"></div>-->
                <div class="logo-desktop">
                    <h2 class="text-uppercase text-primary fw-800 mb-0"><ins class="mr-1">Circadian Gallery</ins></h2>
                    <p class="text-secondary mt-1" style="letter-spacing: -0.04em;">24H cycle NFT auctioning</p>
                </div>
                <div class="logo-mobile">
                    <h3 class="text-uppercase text-primary fw-800"><ins class="mr-1"> Circadian </ins> <ins> Gallery </ins></h3>
                    <h5 class="text-secondary">24H cycle NFT auctioning</h5>
                </div>
            </a>
            <button class="navbar-toggler border-0"
                    type="button"
                    data-toggle="collapse"
                    data-target="#navbarNav"
                    aria-controls="navbarNav"
                    aria-expanded="false"
                    aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse ml-xl-5 pl-xl-5 ml-1 pl-1 " id="navbarNav">
                <ul class="navbar-nav text-uppercase mr-3">
                    <li class="nav-item active pr-3">
                        <a class="nav-link text-primary pt-1" href="#">About us</a>
                    </li>
                    <li class="nav-item pr-3">
                        <a class="nav-link text-primary pt-1" href="#">Previous auctions</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-primary pt-1" href="#">FAQ</a>
                    </li>
                </ul>

                <div class="header-icons ml-1 ml-xl-5 ml-lg-2">
                    <ul>
                        <li> <a href="#"> <div class="twitter bg-primary"></div> </a> </li>
                        <li> <a href="#"> <div class="instagram bg-primary"></div> </a> </li>
                        <li> <a href="#"> <div class="medium bg-primary"></div> </a> </li>
                    </ul>
                    <div class="download-block">
                        <a href="text.txt" download> <div class="download-icon"></div> </a>
                    </div>
                </div>

            </div>
            <div class="download-artist-block bg-white shadow-md">
                
                <div class="download-text-section mt-2 pr-3">
                    <p class="text-uppercase mb-1"> I’m an artist </p>
                    <h5> upload my work </h5>
                </div>

                <div class="download-block">
                    <a href="/login"> <div class="download-icon"></div> </a>
                </div>
                
            </div>
        </nav>
        </div>
    </header>
    <body>

    <div class="container">
        <div class="row mt-0 mt-lg-4 px-0 px-lg-4">
            <div class="col-12 col-xl-3">

                <div class="bids-block-mobile border-secondary mb-3">
                    <h4 class="text-secondary mb-3"> Auction time remaining </h4>
                    <h3 class="text-primary pt-1"> <b>13</b> h <b>22</b> m <b>5</b> s</h3>
                </div>

                <h1 class="text-primary text-2xl mb-4">{{ $submission->name }}</h1>
                <div class="author-block d-flex">
                    <div class="mb-6"> <x-profile :user=" $submission->user " /> </div>
                </div>

                <div class="content-icons pb-3 pb-lg-0 mb-4">
                    <ul>
                        <li> <a href="#"> <div class="twitter bg-primary"></div> </a> </li>
                        <li> <a href="#"> <div class="instagram bg-primary"></div> </a> </li>
                        <li> <a href="#"> <div class="youtube bg-primary"></div> </a> </li>
                    </ul>
                </div>

                <p class="text-primary content-text mt-2 mr-2 lh-24 mb-2">
                    {{ $submission->description }}
                </p>

                <a href="#" class="text-uppercase text-primary read-more"> read more </a>
            </div>

            <div class="col-12 col-xl-6 px-0">
                <div class="post-img px-3 px-lg-0">

                    <a href="{{ $submission->file }}" data-fancybox data-caption="{{ $submission->name }}">
                        <img src="{{ $submission->file }}" id="auctioning" class="shadow-lg">
                        <i class="magnifier-icon"></i>
                    </a>
                </div>
                <div class="nft-details mt-4 text-sm">
                    <div class="mb-2">
                        <b>Non-fungible token</b> (1920x1080px JPEG) This item is unique
                    </div>
                    <div class="mb-2">
                        <b>Contract address:</b> <a href="{{ env('SCAN_URL') }}/address/{{ env('CONTRACT_ADDRESS') }}" target="_blank">{{ env('CONTRACT_ADDRESS') }}</a>
                    </div>
                </div>
            </div>

            <div class="col-12 col-xl-3">
                <div class="bids-block border-secondary desktop ml-3 mb-3">
                    <h4 class="text-secondary mb-3">Time remaining</h4>
                    <h3 class="text-primary pt-1"> <b>13</b> h <b>22</b> m <b>5</b> s</h3>
                </div>

                <div class="bids-button ml-0 ml-lg-3 mb-3">
                    <a class="bg-secondary text-light fw-800 justify-content-center btn-bid" href="#">
                        <p class="p-0 m-0"><img src="/images/icons/metamask.svg" style="width: 20px; display: inline-block; vertical-align: top; margin-right: 5px">PLACE A BID</p>
                        <input class="border-0 pr-3" type="image" src="img/inputArrow.png" value="">
                    </a>
                </div>

                <div class="bids-blocks">
                    <div class="bids-block border-secondary ml-0 ml-lg-3 mb-3 pb-1">
                        <h4 class="text-secondary mb-2">Bids placed</h4>
                        <h3 class="text-primary pt-1"><b class="bids-placed">{{ count($submission->getBids()) }}</b> </h3>
                    </div>
                    
                
                    <div class="bids-block border-secondary ml-0 ml-lg-3 mb-3 pb-1 only-if-has-bids">
                        <h4 class="text-secondary mb-2">Highest bid</h4>
                        <h3 class="text-primary pt-1">Ξ  <b><span class="highest-bid">{{ $submission->getHighestBid() ? $submission->getHighestBid()->value : 0 }}</span></b> </h3>
                    </div>
                    

                </div>
                
            
                <div class="bids-block border-secondary ml-0 ml-lg-3 mb-4 pb-3 only-if-has-bids">
                    <h4 class="text-secondary mb-2">Bid history</h4>
                    <div class="bids-prices bids"></div>
                </div>
                    
            </div>
        </div>
    </div>

    <div class="w-100">
        <div class="px-0">
            <div class="empty-block" style="transform: rotate(-180deg);">
            </div>

            <div class="curated-gallery text-center lh-24">
                <h2 class="text-info mt-4 pt-1" style="letter-spacing: -1.2px"> A <b class="d-flex d-lg-inline-flex justify-content-center">curated gallery</b> auctioning one art
                                                                            piece every 24 hours</h2>
                <p class="text-primary pt-1 font-weight-light ls-03">We help artists to sell their art on the blockchain. Artists
                                                            submit their work, we take care of the rest.</p>
            </div>

            <div class="empty-block">
            </div>
        </div>
    </div>

    <div class="about-us-section mt-2 mb-0 mb-lg-5">
        <div class="container">
            <div class="row px-0 px-lg-4 pb-1">
                <div class="col-12">
                    <p class="text-uppercase text-primary block-title"> <span>About us </span> </p>
                </div>
            </div>

            <div class="row mt-1 mt-lg-5 pt-0 pt-lg-4 px-3 px-xl-5">
                <div class="col-12 col-xl-6 text-primary px-0 px-xl-5 pb-3">
                    <h2 class="text-uppercase fw-800 pl-0 pl-xl-4"> The ENDLESS ART </h2>
                    <p class="pl-0 pl-xl-4 lh-24 mt-2 mt-lg-4 ls-07"> We aim to further push the flow of digital art from artists to buyers. We aim to have new artists
                        coming into the blockchain. </p>
                </div>

                <div class="col-12 col-xl-6 text-primary px-0 px-xl-4 pb-3">
                    <h2 class="text-uppercase fw-800 px-0 px-xl-3"> THE CYCLE </h2>
                    <p class="lh-24 mt-2 mt-lg-4 px-0 px-xl-3 ls-07"> New artworks are placed at the end of the queue. When art is sold, it exits our system. But when art
                        is not sold, it goes to the back of the queue to be placed in auction much later. </p>
                </div>

                <div class="col-12 col-xl-6 text-primary px-0 px-xl-5 pb-3">
                    <h2 class="text-uppercase fw-800 pl-0 pl-xl-4"> The ARTISTS </h2>
                    <p class="pl-0 pl-xl-4 lh-24 mt-2 mt-lg-4 ls-07"> Become a featured creator. Every artist goes under the spotlight for 24 hours. Minting fees are paid
                        by the buyer, not the artist. Paid at the moment that the auction is finished Our contract is
                        written so that you get royalties for every resell on the secondary market. </p>
                </div>

                <div class="col-12 col-xl-6 text-primary px-0 px-xl-4 pb-3">
                    <h2 class="text-uppercase fw-800 px-0 px-xl-3"> THE COMMUNITY </h2>
                    <p class="lh-24 mt-2 mt-lg-4 px-0 px-xl-3 ls-07"> This gallery has not only been shared by us, but also by our community of listed artists who want
                        collectors to join us. This further increases traffic and views.<br>
                        Collectors drop by everyday to check the hot new artist. </p>
                </div>
            </div>
        </div>
    </div>

    <div class="previous-auctions pt-1 pt-lg-1 mb-5">
        <div class="container">
            <div class="row px-0 px-lg-4 mb-3">
                <div class="col-12">
                    <p class="text-uppercase text-primary block-title"> <span> Previous Auctions </span> </p>
                </div>
            </div>

            <div class="row px-4">
                <div class="col-12 d-block d-xl-flex text-left text-md-center text-xl-left">

                    @foreach($previous_auctions as $auction)
                        
                        <div class="previous-auctions__block align-top">
                            <p class="text-secondary my-1 fw-600">{{ $auction->auctioning_at->format('d/m/Y') }}</p>
                            <h2>Ξ @if($auction->winningBid) {{ $auction->winningBid->value }} @else 0 @endif</h2>
                            <img src="{{ $submission->file }}" alt="takashi">
                            <p class="text-primary fw-800 mt-2 mb-2 lh-24">{{ $auction->name }}</p>
                            <p class="text-primary"><span class="fw-300"> by </span> <span class="fw-600">{{ $auction->user->name }}</span> </p>
                        </div>

                    @endforeach

                </div>
                
            </div>
        </div>
    </div>

    <div class="faq pt-4">
        <div class="container">
            <div class="row px-0 px-lg-4 mb-3 mt-3 pt-1 pb-1">
                <div class="col-12">
                    <p class="text-uppercase text-primary block-title"> <span> faq </span> </p>
                </div>
            </div>

            <div class="row px-0 px-xl-4 pt-0">
                <div class="col-12 col-xl-6">
                    <div class="accordion md-accordion" id="accordionEx" role="tablist" aria-multiselectable="true">
                        <div class="card border-0 bg-transparent text-primary">
                            <div class="card-header bg-transparent pl-2" role="tab" id="headingOne1">
                                <a data-toggle="collapse" data-parent="#accordionEx" href="#collapseOne1" aria-expanded="true"
                                aria-controls="collapseOne1">
                                    <p class="mb-0 fw-800">
                                        <i class="accordion-icon"></i> What is an NFT?
                                    </p>
                                </a>
                            </div>
                            <div id="collapseOne1" class="collapse show" role="tabpanel" aria-labelledby="headingOne1"
                                data-parent="#accordionEx">
                                <div class="card-body lh-24 pl-4 pb-2">
                                    NFT stands for Non-fungible token. “Non-fungible” means that it’s unique and can’t be
                                    replaced with something else. For example, a bitcoin is fungible — trade one for another
                                    bitcoin, and you’ll have exactly the same thing. A one-of-a-kind trading card, however,
                                    is non-fungible. If you traded it for a different card, you’d have something completely
                                    different.
                                </div>
                            </div>
                        </div>

                        <div class="card border-0 bg-transparent text-primary">
                            <div class="card-header bg-transparent pl-2" role="tab" id="headingTwo2">
                                <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx" href="#collapseTwo2"
                                aria-expanded="false" aria-controls="collapseTwo2">
                                    <p class="mb-0 fw-800">
                                        <i class="accordion-icon"></i> How do NFTs work?
                                    </p>
                                </a>
                            </div>
                            <div id="collapseTwo2" class="collapse" role="tabpanel" aria-labelledby="headingTwo2"
                                data-parent="#accordionEx">
                                <div class="card-body lh-24 pl-4 pb-2">
                                    NFT stands for Non-fungible token. “Non-fungible” means that it’s unique and can’t be
                                    replaced with something else. For example, a bitcoin is fungible — trade one for another
                                    bitcoin, and you’ll have exactly the same thing. A one-of-a-kind trading card, however,
                                    is non-fungible. If you traded it for a different card, you’d have something completely
                                    different.
                                </div>
                            </div>
                        </div>

                        <div class="card border-0 bg-transparent text-primary">
                            <div class="card-header bg-transparent pl-2" role="tab" id="headingTwo3">
                                <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx" href="#collapseTwo3"
                                aria-expanded="false" aria-controls="collapseTwo3">
                                    <p class="mb-0 fw-800">
                                        <i class="accordion-icon"></i> How can I benefit as an artist?
                                    </p>
                                </a>
                            </div>
                            <div id="collapseTwo3" class="collapse" role="tabpanel" aria-labelledby="headingTwo3"
                                data-parent="#accordionEx">
                                <div class="card-body lh-24 pl-4 pb-2">
                                    NFT stands for Non-fungible token. “Non-fungible” means that it’s unique and can’t be
                                    replaced with something else. For example, a bitcoin is fungible — trade one for another
                                    bitcoin, and you’ll have exactly the same thing. A one-of-a-kind trading card, however,
                                    is non-fungible. If you traded it for a different card, you’d have something completely
                                    different.
                                </div>
                            </div>
                        </div>

                        <div class="card border-0 bg-transparent text-primary">
                            <div class="card-header bg-transparent pl-2" role="tab" id="headingTwo4">
                                <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx" href="#collapseTwo4"
                                aria-expanded="false" aria-controls="collapseTwo4">
                                    <p class="mb-0 fw-800">
                                        <i class="accordion-icon"></i> Why should I buy NFT art?
                                    </p>
                                </a>
                            </div>
                            <div id="collapseTwo4" class="collapse" role="tabpanel" aria-labelledby="headingTwo4"
                                data-parent="#accordionEx">
                                <div class="card-body lh-24 pl-4 pb-2">
                                    NFT stands for Non-fungible token. “Non-fungible” means that it’s unique and can’t be
                                    replaced with something else. For example, a bitcoin is fungible — trade one for another
                                    bitcoin, and you’ll have exactly the same thing. A one-of-a-kind trading card, however,
                                    is non-fungible. If you traded it for a different card, you’d have something completely
                                    different.
                                </div>
                            </div>
                        </div>

                        <div class="card border-0 bg-transparent text-primary">
                            <div class="card-header bg-transparent pl-2" role="tab" id="headingTwo5">
                                <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx" href="#collapseTwo5"
                                aria-expanded="false" aria-controls="collapseTwo5">
                                    <p class="mb-0 fw-800">
                                        <i class="accordion-icon"></i> Can I buy NFTs with cryptocurrencies?
                                    </p>
                                </a>
                            </div>
                            <div id="collapseTwo5" class="collapse" role="tabpanel" aria-labelledby="headingTwo5"
                                data-parent="#accordionEx">
                                <div class="card-body lh-24 pl-4 pb-2">
                                    NFT stands for Non-fungible token. “Non-fungible” means that it’s unique and can’t be
                                    replaced with something else. For example, a bitcoin is fungible — trade one for another
                                    bitcoin, and you’ll have exactly the same thing. A one-of-a-kind trading card, however,
                                    is non-fungible. If you traded it for a different card, you’d have something completely
                                    different.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-xl-6 mt-5 mt-lg-2">
                    <p class="text-primary fw-800 mt-2 mb-2 pl-2"> The MetaMask Wallet. </p>
                    <p class="text-primary pl-2 lh-24">
                        Buy, store, send and swap tokens<br>
                        Available as a browser extension and as a mobile app, MetaMask equips you with a key vault, secure
                        login, token wallet, and token<br> exchange—everything you need to manage your digital assets.</p>
                    <div class="pt-2 text-center text-lg-left">
                        <img src="img/faqImg.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>

    </body>
    <footer>
        <div class="footer footer-bg-hortensia">
            <div class="container">
                <div class="row pt-5 px-2 px-xl-4">
                    <div class="col-12 col-xl-4 pl-0 pl-xl-4">
                        <div class="ml-2 footer__blocks">
                            <h3 class="footer__gradient-title text-uppercase fw-800 pb-1"> the newsletter </h3>
                            <div class="inputtest d-flex pb-3">
                                <input style="height: 56px" class="border-0" type="email" size="31" placeholder="Signup for the newsletter...">
                                <input class="border-0 bg-secondary p-3" type="image" src="img/inputArrow.png" value="">
                            </div>
                            <p class="text-primary fw-800 text-uppercase mt-4 mb-4"> Stay up to date </p>
                            <p class="text-primary lh-24 pr-1"> Sign up for our newsletter to get a daily art piece in your mail and never miss out on awesome inspiration. </p>
                        </div>
                    </div>

                    <div class="col-12 col-xl-4 pl-0 pl-xl-4">
                        <div class="ml-2 footer__blocks">
                            <h3 class="footer__gradient-title text-uppercase fw-800 pb-1"> the NEWS </h3>
                            <div class="footer__nyan-cat-block mt-2">
                                <div class="footer__news-image">
                                    <img src="/images/footer/nyanCat.png" alt="Nyan Cat">
                                </div>

                                <div class="pl-3 ml-1 pr-4">
                                    <p class="text-primary fw-800 lh-24 mb-0"><ins> Nyan Cat is being sold as a one-of-a-kind piece of crypto art </ins></p>
                                    <h5 class="text-primary mt-2"> www.theverge.com </h5>
                                </div>
                            </div>

                            <div class="footer__nyan-cat-block mt-3">
                                <div class="footer__news-image">
                                    <img src="/images/footer/crypto.png" alt="Crypto">
                                </div>

                                <div class="pl-3 ml-1 pr-4">
                                    <p class="text-primary fw-800 lh-24 mb-0"><ins> People are reporting that thousands of dollars' worth of crypto art was stolen on an NFT marketplace </ins></p>
                                    <h5 class="text-primary mt-2"> www.businessinsider.com </h5>
                                </div>
                            </div>

                            <div class="footer__nyan-cat-block mt-3">
                                <div class="footer__news-image">
                                    <img src="/images/footer/investmentManiasAbound.png" alt="Investment Manias Abound">
                                </div>

                                <div class="pl-3 ml-1 pr-4">
                                    <p class="text-primary fw-800 lh-24 mb-0"><ins> From Crypto Art to Trading Cards, Investment Manias Abound </ins></p>
                                    <h5 class="text-primary mt-2"> www.nytimes.com </h5>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-xl-4 pl-0 pl-xl-4">
                        <div class="ml-2 ml-lg-3 footer__blocks">
                            <h3 class="footer__gradient-title text-uppercase fw-800 pb-1"> the Socials </h3>
                            <div class="footer__social pt-2">
                                <div class="d-flex align-items-center text-uppercase pb-4 mb-1">
                                    <a class="footer__social-link-icon" href="#"> <div class="twitter-footer bg-primary"></div> </a>
                                    <a class="pt-1" href="#"> <h4 class="fw-800 text-primary"> <ins>@circadiangallery</ins> </h4> </a>
                                </div>

                                <div class="d-flex align-items-center text-uppercase pb-4">
                                    <a class="footer__social-link-icon" href="#"> <div class="instagram-footer bg-primary"></div> </a>
                                    <a class="pt-1" href="#"> <h4 class="fw-800 text-primary"> <ins>@circadiangallery</ins> </h4> </a>
                                </div>

                                <div class="d-flex align-items-center text-uppercase pb-4">
                                    <a class="footer__social-link-icon" href="#"> <div class="youtube-footer bg-primary"></div> </a>
                                    <a class="pt-1" href="#"> <h4 class="fw-800 text-primary"> <ins>/circadian-gallery</ins> </h4> </a>
                                </div>

                                <div class="d-flex align-items-center text-uppercase pb-4">
                                    <a class="footer__social-link-icon" href="#"> <div class="tik-tok-footer bg-primary"></div> </a>
                                    <a class="pt-1" href="#"> <h4 class="fw-800 text-primary"> <ins>@circadiangallery</ins> </h4> </a>
                                </div>

                                <div class="d-flex align-items-center text-uppercase pb-4">
                                    <a class="footer__social-link-icon" href="#"> <div class="snapchat-footer bg-primary"></div> </a>
                                    <a class="pt-1" href="#"> <h4 class="fw-800 text-primary"> <ins>@circadiangallery</ins> </h4> </a>
                                </div>

                                <div class="d-flex align-items-center text-uppercase pb-4 mb-1">
                                    <a class="footer__social-link-icon" href="#"> <div class="medium-footer bg-primary"></div> </a>
                                    <a class="pt-1" href="#"> <h4 class="fw-800 text-primary"> <ins>/circadiangallery</ins> </h4> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="footer__privacy-policy text-uppercase text-primary mx-0 mx-xl-4">
                    <p class="fw-800 pb-4 pb-lg-0"> <a href="#"> <ins>Privacy POlicy</ins> </a> </p>
                    <p class="fw-800 pb-4 pb-lg-0"> <a href="#"> <ins>Terms & conditions</ins> </a> </p>
                    <p> Design by <b><a href="#"><ins>micheldemeere.nl</ins></a> 2021</b> </p>
                </div>
            </div>
        </div>

        <x-ui.bid-modal />

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <!--    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>-->
        <script src="//code.jquery.com/jquery-3.2.1.min.js"></script>
        <!--    <script src="jquery.fancybox.min.js"></script>-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js" integrity="sha512-uURl+ZXMBrF4AwGaWmEetzrd+J5/8NRkWAvJx5sbPSSuOb0bZLqf+tOzniObO00BjHa/dD7gub9oCGMLPQHtQA==" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

        <script src="/js/vendor/Vibrant.min.js"></script>
        <script>
            $(function() {

                // sets the page background color gradient to the ones on the image

                var img = $('#auctioning')[0];
                var root = document.documentElement;
                img.addEventListener('load', function() {
                    var vibrant = new Vibrant(img);
                    var swatches = vibrant.swatches()
                    for (var swatch in swatches){
                        if (swatches.hasOwnProperty(swatch) && swatches[swatch])
                            root.style.setProperty('--dyn-color-' + swatch, swatches[swatch].getHex());
                    }

                });
            });
        </script>
    </footer>
    </div>

</body>
</html>