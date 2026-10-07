@extends('layouts.header')

@section('title', 'Jeep & SUV Dealer | Jeep Accessories & Customization | Rabdeep Motors')
@section('description', 'Explore Jeep and SUV vehicles, premium accessories, customization options and automotive
services at Rabdeep Motors. Find the right vehicle and accessories for your needs.')

@section('content')


<div class="clearfix"></div>
<!-- =-=-=-=-=-=-= Primary Header End =-=-=-=-=-=-= -->
<!-- Master Slider -->
<div class="master-slider ms-skin-default" id="masterslider">
    <!-- slide 1 -->
    <div class="ms-slide slide-1" data-delay="5">
        <!-- slide background -->
        <img src="{{ asset('js/masterslider/style/blank.gif') }}"
            data-src="{{ asset('images/slider/banner-image.jpg') }}" alt="Slide1 background" />
        <h3 class="ms-layer title4 font-white font-uppercase font-thin-xs" style="left:120px; top:150px;"
            data-type="text" data-delay="2000" data-duration="2000" data-ease="easeOutExpo"
            data-effect="skewleft(30,80)">Build Your Dream
            Jeep</h3>
        <h3 class="ms-layer title4 font-white font-thin-xs banner-parent" style="left:120px; top:210px;" data-type="text"
            data-delay="2500" data-duration="2000" data-ease="easeOutExpo" data-effect="skewleft(30,80)"><span
                class="font-color font-thin-xs heading-color banner-text">Modified Jeeps</span></h3>
        <h5 class="ms-layer text1 font-white" style="left: 120px; top: 280px;" data-type="text" data-effect="bottom(45)"
            data-duration="2500" data-delay="3000" data-ease="easeOutExpo">Custom-built Jeeps designed with style,
            performance<br> and personalized modifications by Rabdeep Motors.
        </h5>
        <a class="ms-layer btn3 uppercase" style="left:120px; top: 390px;" data-type="text" data-delay="3500"
            data-ease="easeOutExpo" data-duration="2000" data-effect="scale(1.5,1.6)">View Portfolio</a>
    </div>
    <!-- end of slide -->
    <!-- slide 2 -->
    <div class="ms-slide slide-3" data-delay="5">
        <!-- slide background -->
        <img src="{{ asset('js/masterslider/style/blank.gif') }}"
            data-src="{{ asset('images/slider/banner-image.jpg') }}" alt="Slide1 background" />
        <h3 class="ms-layer title4 font-white font-uppercase font-thin-xs" style="left:120px; top:150px;"
            data-type="text" data-delay="2000" data-duration="2000" data-ease="easeOutExpo"
            data-effect="skewleft(30,80)">Make It Your Own
        </h3>
        <h3 class="ms-layer title4 font-white font-thin-xs banner-parent" style="left:120px; top:210px;" data-type="text"
            data-delay="2500" data-duration="2000" data-ease="easeOutExpo" data-effect="skewleft(30,80)"><span
                class="font-color font-thin-xs heading-color banner-text">Complete Jeep Customization</span></h3>
        <h5 class="ms-layer text1 font-white" style="left: 120px; top: 280px;" data-type="text" data-effect="bottom(45)"
            data-duration="2500" data-delay="3000" data-ease="easeOutExpo">From exterior styling and alloy wheels to
            premium interiors<br> and performance upgrades, customize your Jeep your way.
        </h5>
        <a class="ms-layer btn3 uppercase" style="left:120px; top: 390px;" data-type="text" data-delay="3500"
            data-ease="easeOutExpo" data-duration="2000" data-effect="scale(1.5,1.6)"> View Accessories</a>
    </div>
    <!-- end of slide -->
    <div class="ms-slide slide-2" data-delay="4">
        <div class="ms-overlay-layers"></div>
        <!-- slide background -->
        <img src="{{ asset('js/masterslider/style/blank.gif') }}"
            data-src="{{ asset('images/slider/banner-image.jpg') }}" alt="Slide1 background" />
        <h3 class="ms-layer title4 font-white font-uppercase font-thin-xs" style="left:120px; top:150px;"
            data-type="text" data-delay="2000" data-duration="2000" data-ease="easeOutExpo"
            data-effect="skewleft(30,80)">Welcome To
        </h3>
        <h3 class="ms-layer title4 font-white font-thin-xs banner-parent" style="left:120px; top:210px;" data-type="text"
            data-delay="2500" data-duration="2000" data-ease="easeOutExpo" data-effect="skewleft(30,80)"><span
                class="font-color font-thin-xs heading-color banner-text">Rabdeep Motors</span></h3>
        <h5 class="ms-layer text1 font-white" style="left: 120px; top: 280px;" data-type="text" data-effect="bottom(45)"
            data-duration="2500" data-delay="3000" data-ease="easeOutExpo">Discover modified Jeeps, custom-built
            vehicles
            and<br> premium automotive customization from Rabdeep Motors.
        </h5>
        <a class="ms-layer btn3 uppercase" style="left:120px; top: 390px;" data-type="text" data-delay="3500"
            data-ease="easeOutExpo" data-duration="2000" data-effect="scale(1.5,1.6)"> About Us</a>
    </div>
    <!-- slide 2 -->
    <!-- end of slide -->
</div>

<section class="search-best-section" style="margin-bottom: 30px;">

    <div class="container">

        <div class="search-best-box">

            <!-- Heading -->
            <h2>Search For Best Jeep</h2>

            <div class="search-best-slider">

                <div class="search-best-wrapper" id="searchBestWrapper">
                    <!-- Card 1 : Google Business Profile -->
                    <a href="https://share.google/7xmVXYN4cOPZ5GjvU" class="search-best-card" target="_blank"
                        rel="noopener noreferrer">
                        <div class="search-card-icon google-icon">
                            <!-- Google G Logo -->
                            <svg viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg" aria-label="Google" role="img">
                                <path fill="#4285F4"
                                    d="M24 9.5c3.54 0 6.7 1.22 9.19 3.61l6.85-6.85C35.9 2.38 30.47 0 24 0 14.61 0 6.5 5.38 2.56 13.22l7.98 6.19C12.43 13.07 17.74 9.5 24 9.5z" />
                                <path fill="#34A853"
                                    d="M46.5 24.5c0-1.57-.14-3.08-.41-4.5H24v9.02h12.65c-.54 2.91-2.18 5.38-4.65 7.02l7.55 5.86C43.95 37.73 46.5 31.65 46.5 24.5z" />
                                <path fill="#FBBC05"
                                    d="M10.54 28.41A14.47 14.47 0 0 1 9.5 24c0-1.53.37-3.01 1.04-4.41l-7.98-6.19A23.94 23.94 0 0 0 0 24c0 3.84.92 7.47 2.56 10.6l7.98-6.19z" />
                                <path fill="#EA4335"
                                    d="M24 48c6.48 0 11.92-2.14 15.9-5.82l-7.55-5.86c-2.09 1.4-4.76 2.23-8.35 2.23-6.26 0-11.57-3.57-13.46-8.91l-7.98 6.19C6.5 42.62 14.61 48 24 48z" />
                            </svg>
                        </div>
                        <h3>
                            No. 1 Google Rank
                        </h3>
                        <p>
                            View on Google
                        </p>
                    </a>


                    <!-- Card 2 : YouTube -->
                    <a href="{{ $CompanyYoutube }}" target="_blank" rel="noopener noreferrer" class="search-best-card">

                        <div class="search-card-icon youtube-icon">
                            <i class="fa-brands fa-youtube"></i>
                        </div>

                        <h3>You Tube</h3>
                        <p>Follow Us</p>

                    </a>


                    <!-- Card 3 : Instagram -->
                    <a href="{{ $CompanyInstagram }}" target="_blank" rel="noopener noreferrer"
                        class="search-best-card">

                        <div class="search-card-icon instagram-icon">
                            <i class="fa-brands fa-instagram"></i>
                        </div>

                        <h3>Instagram</h3>
                        <p>Follow Us</p>

                    </a>


                    <!-- Card 4 : Facebook -->
                    <a href="{{ $CompanyFacebook }}" target="_blank" rel="noopener noreferrer" class="search-best-card">
                        <div class="search-card-icon facebook-icon">
                            <i class="fa-brands fa-facebook-f"></i>
                        </div>
                        <h3>Facebook</h3>
                        <p>Follow Us</p>
                    </a>


                    <!-- Card 5 : Recently Deals Jeep -->
                    <a href="{{ route('portfolio') }}" class="search-best-card">
                        <div class="search-card-icon deals-icon">
                            <i class="fa-solid fa-tags"></i>
                        </div>
                        <h3>Recently Deals Jeep</h3>
                        <p>Jeep Deals</p>
                    </a>


                    <!-- Card 6 : Fully Modified Jeep -->
                    <a href="{{ route('product') }}" class="search-best-card">
                        <div class="search-card-icon modified-icon">
                            <i class="fa-solid fa-screwdriver-wrench"></i>
                        </div>
                        <h3>Fully Modified Jeep</h3>
                        <p>Show Now</p>
                    </a>
                </div>

            </div>

        </div>

    </div>

</section>
<!-- end Master Slider -->
<!-- =-=-=-=-=-=-= Main Content Area =-=-=-=-=-=-= -->
<div class="main-content-area clearfix">
@foreach ($categories as $category)
    <!-- Only show section if the category actually has loaded products -->
    @if ($category->products->count() > 0)
        <section class="popular-cars-section ">
            <div class="container">
                <!-- Heading Row -->
                <div class="heading-wrapper d-flex justify-content-between align-items-center mb-3">
                    <h2>{{ $category->name }}</h2>
                    <!-- You can pass a category filter parameter to the route if needed -->
                    <a href="{{ route('product') }}" class="view-all-link">VIEW ALL  ></a>
                </div>

                <!-- Slider Container (Buttons + Cards) -->
                <div class="slider-container" style="position: relative;">
                    <!-- Left Button (Dynamic ID) -->
                    <button class="slider-btn prev-btn" id="slideLeft-{{ $category->id }}">&#10094;</button>

                    <!-- Scrollable Cards (Dynamic ID) -->
                    <div class="cards-wrapper" id="cardsWrapper-{{ $category->id }}">
                        @foreach ($category->products as $product)
                            <!-- Card -->
                            <div class="car-card">
                                <div class="car-img-wrapper">
                                    <img alt="{{ $product->product_name }}" src="{{ asset('admin-manage/Uploads/' . $product->product_image1) }}">
                                </div>
                                <div class="car-details">
                                    <h3 class="car-name">{{ $product->product_name }}</h3>
                                    <div class="car-price">₹ {{ $product->product_price }}</div>
                                    <a href="{{ route('product.details', ['slug' => $product->slug]) }}" class="promo-text">View More</a>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Right Button (Dynamic ID) -->
                    <button class="slider-btn next-btn" id="slideRight-{{ $category->id }}">&#10095;</button>
                </div>
            </div>
        </section>
    @endif
@endforeach

    <!-- =-=-=-=-=-=-= Statistics Counter =-=-=-=-=-=-= -->
    <div class="funfacts custom-padding parallex">
        <div class="container">
            <div class="row">

                <!-- Total Jeeps -->
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                    <div class="icons">
                        <i class="flaticon-vehicle"></i>
                    </div>

                    <div class="number">
                        <span class="timer" data-from="0" data-to="250" data-speed="1500"
                            data-refresh-interval="5">0</span>+
                    </div>

                    <h4>Total <span>Jeeps</span></h4>
                </div>


                <!-- Verified Dealers -->
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                    <div class="icons">
                        <i class="flaticon-security"></i>
                    </div>

                    <div class="number">
                        <span class="timer" data-from="0" data-to="50" data-speed="1500"
                            data-refresh-interval="5">0</span>+
                    </div>

                    <h4>Verified <span>Dealers</span></h4>
                </div>


                <!-- Happy Customers -->
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                    <div class="icons">
                        <i class="flaticon-like-1"></i>
                    </div>

                    <div class="number">
                        <span class="timer" data-from="0" data-to="500" data-speed="1500"
                            data-refresh-interval="5">0</span>+
                    </div>

                    <h4>Happy <span>Customers</span></h4>
                </div>


                <!-- Featured Jeeps -->
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                    <div class="icons">
                        <i class="flaticon-cup"></i>
                    </div>

                    <div class="number">
                        <span class="timer" data-from="0" data-to="25" data-speed="1500"
                            data-refresh-interval="5">0</span>+
                    </div>

                    <h4>Featured <span>Jeeps</span></h4>
                </div>

            </div>
        </div>
    </div>
    <!-- =-=-=-=-=-=-= Statistics Counter End =-=-=-=-=-=-= -->

    <!-- Instagram Reels Section -->
    <section class="instagram-reels-section">
        <div class="container">

            <!-- Heading Row -->
            <div class="heading-wrapper">
                <h2>
                    Latest Videos
                </h2>
                <a href="https://www.instagram.com/" target="_blank" rel="noopener noreferrer" class="view-all-link">
                    ALL VIDEOS &gt;
                </a>
            </div>


            <!-- Slider Container -->
            <div class="slider-container">

                <!-- Left Button -->
                <button class="slider-btn prev-btn" id="reelsSlideLeft" type="button">
                    &#10094;
                </button>

                <!-- Reels -->
                <div class="cards-wrapper" id="reelsWrapper">
                    @forelse($reels as $reel)
                    <div class="reel-card">
                        <a href="{{ $reel->instagram_url }}" target="_blank" rel="noopener noreferrer">
                            <div class="reel-video-wrapper">
                                @if(!empty($reel->thumbnail))
                                <img src="{{ asset('admin-manage/Uploads/' . $reel->thumbnail) }}" alt="Instagram Reel"
                                    loading="lazy">
                                @else
                                <div class="instagram-placeholder">
                                    <i class="fa fa-instagram"></i>
                                </div>
                                @endif

                                <div class="reel-overlay">
                                    <span class="play-button">
                                        &#9654;
                                    </span>
                                </div>
                            </div>
                        </a>
                    </div>
                    @empty
                    <div class="col-md-12 text-center">
                        <p>
                            No videos available at the moment.
                        </p>
                    </div>
                    @endforelse
                </div>

                <!-- Right Button -->
                <button class="slider-btn next-btn" id="reelsSlideRight" type="button">
                    &#10095;
                </button>
            </div>
        </div>

    </section>

    <section class="custom-padding accessories-section">
        <div class="container">

            <!-- HEADING -->
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="heading-panel">
                        <h1>
                            Premium
                            <span class="heading-color">
                                Jeep Accessories
                            </span>
                        </h1>
                    <a href="{{ route('accessories') }}" class="view-all-link">VIEW ALL  ></a>

                    </div>
                </div>
            </div>

            <!-- ==========================================
                       CATEGORY FILTER
                     =========================================== -->

            <div class="row accessories-category-row">
                <!-- ALL -->
                <div class="col-md-2 col-sm-4 col-xs-6">
                    <button type="button" class="accessory-filter active" data-filter="all">
                        <i class="fa fa-th-large"></i>
                        <span>All</span>
                    </button>
                </div>


                <!-- EXTERIOR -->
                <div class="col-md-2 col-sm-4 col-xs-6">
                    <button type="button" class="accessory-filter" data-filter="exterior">
                        <i class="fa fa-car"></i>
                        <span>Exterior</span>
                    </button>
                </div>


                <!-- LIGHTING -->
                <div class="col-md-2 col-sm-4 col-xs-6">
                    <button type="button" class="accessory-filter" data-filter="lighting">
                        <i class="fa fa-lightbulb-o"></i>
                        <span>Lighting</span>
                    </button>
                </div>


                <!-- WHEELS -->
                <div class="col-md-2 col-sm-4 col-xs-6">
                    <button type="button" class="accessory-filter" data-filter="wheels">
                        <i class="fa fa-circle-o"></i>
                        <span>Wheels</span>
                    </button>
                </div>


                <!-- INTERIOR -->
                <div class="col-md-2 col-sm-4 col-xs-6">
                    <button type="button" class="accessory-filter" data-filter="interior">
                        <i class="fa fa-car"></i>
                        <span>Interior</span>
                    </button>
                </div>

            </div>


            <!-- ==========================================
                                                         ACCESSORIES GRID
                                            =========================================== -->

            <div class="row accessories-grid">

                @forelse ($Accessories as $item)
                @php
                $category = strtolower(trim($item->category));
                $image = asset('admin-manage/Uploads/' . $item->image);
                $whatsappMessage = 'Hello Rabdeep Motors, I am interested in ' . $item->title . '. Price: ₹' .
                $item->price;
                @endphp

                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 accessory-item" data-category="{{ $category }}">
                    <div class="accessory-card">

                        <!-- IMAGE -->
                        <div class="accessory-image">
                            <img src="{{ $image }}" alt="{{ $item->title }}" class="img-responsive">
                            <span class="accessory-badge">
                                {{ ucfirst($item->category) }}
                            </span>
                            <a href="{{ $image }}" class="accessory-zoom" target="_blank"
                                title="View {{ $item->title }}">
                                <i class="fa fa-search-plus"></i>
                            </a>
                        </div>
                        <!-- CONTENT -->
                        <div class="accessory-content">
                            <!-- CATEGORY -->
                            <span class="accessory-category">
                                {{ $item->category }}
                            </span>
                            <!-- TITLE -->
                            <h3>
                                {{ $item->title }}
                            </h3>
                            <!-- FOOTER -->
                            <div class="accessory-footer">
                                <!-- PRICE -->
                                <strong>
                                    ₹{{ $item->price }}
                                </strong>
                                <!-- WHATSAPP -->
                                <a href="https://wa.me/91{{ $CompanyPhone1 }}?text={{ urlencode($whatsappMessage) }}"
                                    target="_blank" rel="noopener noreferrer">
                                    Enquire Now
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-md-12">
                    <div class="alert alert-info text-center">
                        No accessories available at the moment.
                    </div>
                </div>
                @endforelse
            </div>
        </div>
    </section>


    <!-- =-=-=-=-=-=-= Customer Reviews Section =-=-=-=-=-=-= -->
    <section class="news section-padding">
        <div class="container">
            <div class="row">
                <div class="heading-panel">
                    <div class="col-xs-12 col-md-12 col-sm-12 left-side">
                        <!-- Main Title -->
                        <h1>
                            Customer
                            <span class="heading-color">
                                Reviews
                            </span>
                        </h1>

                        <!-- Short Description -->
                        <p>
                            See what our customers have to say about their
                            experience with Rabdeep Motors, from Jeep purchases
                            to accessories and vehicle customization.
                        </p>
                    </div>
                </div>

                <!-- Middle Content Box -->
                <div class="col-md-12 col-xs-12 col-sm-12">
                    <div class="row">
                        <div class="owl-testimonial-1">

                            <!-- Review 1 -->
                            <div class="single_testimonial">
                                <div class="textimonial-content">
                                    <h4>
                                        Great Jeep Buying Experience
                                    </h4>
                                    <p>
                                        Rabdeep Motors made the Jeep buying
                                        process simple and straightforward.
                                        The team was helpful in explaining
                                        the vehicle features and available
                                        options.
                                    </p>
                                </div>

                                <div class="testimonial-meta-box">
                                    <div class="testimonial-meta">

                                        <p>
                                            Karanjeet Singh
                                        </p>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                </div>
                            </div>

                            <!-- Review 2 -->
                            <div class="single_testimonial">
                                <div class="textimonial-content">
                                    <h4>
                                        Excellent Jeep Accessories
                                    </h4>
                                    <p>
                                        I was looking for quality accessories
                                        for my Jeep and found several useful
                                        options at Rabdeep Motors. The team
                                        helped me choose accessories according
                                        to my requirements.
                                    </p>
                                </div>

                                <div class="testimonial-meta-box">
                                    <div class="testimonial-meta">

                                        <p>
                                            Arshdeep
                                        </p>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                </div>
                            </div>


                            <!-- Review 3 -->

                            <div class="single_testimonial">
                                <div class="textimonial-content">
                                    <h4>
                                        Professional Customization
                                    </h4>
                                    <p>
                                        The customization team understood
                                        what I wanted for my Jeep and helped
                                        me select the right accessories and
                                        styling options for my vehicle.
                                    </p>
                                </div>

                                <div class="testimonial-meta-box">
                                    <div class="testimonial-meta">

                                        <p>
                                            Raman
                                        </p>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                </div>
                            </div>

                            <!-- Review 4 -->
                            <div class="single_testimonial">
                                <div class="textimonial-content">
                                    <h4>
                                        Helpful & Knowledgeable Team
                                    </h4>
                                    <p>
                                        The Rabdeep Motors team was helpful
                                        throughout the process. They explained
                                        the available Jeep options and helped
                                        me make the right choice for my needs.
                                    </p>
                                </div>

                                <div class="testimonial-meta-box">
                                    <div class="testimonial-meta">

                                        <p>
                                            Aryan
                                        </p>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                </div>
                            </div>


                            <!-- Review 5 -->
                            <div class="single_testimonial">
                                <div class="textimonial-content">
                                    <h4>
                                        Quality Jeep Styling Options
                                    </h4>
                                    <p>
                                        Rabdeep Motors offers a good range of
                                        Jeep styling and accessory options.
                                        The team helped me find products that
                                        matched the look I wanted for my SUV.
                                    </p>
                                </div>

                                <div class="testimonial-meta-box">
                                    <div class="testimonial-meta">

                                        <p>
                                            Dilbag Singh
                                        </p>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                </div>
                            </div>


                            <!-- Review 6 -->
                            <div class="single_testimonial">
                                <div class="textimonial-content">
                                    <h4>
                                        Trusted Jeep & SUV Partner
                                    </h4>
                                    <p>
                                        The overall experience was smooth and
                                        professional. Rabdeep Motors provides
                                        helpful guidance for Jeep vehicles,
                                        accessories and customization needs.
                                    </p>
                                </div>
                                <div class="testimonial-meta-box">
                                    <div class="testimonial-meta">

                                        <p>
                                            Karan
                                        </p>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <!-- Middle Content Box End -->
            </div>
            <div class="clearfix"></div>
        </div>

    </section>

    <!-- =-=-=-=-=-=-= Customer Reviews Section End =-=-=-=-=-=-= -->


    <!-- =-=-=-=-=-=-= Blog Section =-=-=-=-=-=-= -->
    <section class="custom-padding">
        <!-- Main Container -->
        <div class="container">
            <!-- Content Box -->
            <!-- Row -->
            <div class="row">
                <!-- Heading Area -->
                <div class="heading-panel">
                    <div class="col-xs-12 col-md-12 col-sm-12 text-center">
                        <!-- Main Title -->
                        <h1>Latest <span class="heading-color"> Blog</span> Post</h1>
                    </div>
                </div>
                <!-- Middle Content Box -->
                <div class="col-md-12 col-xs-12 col-sm-12">
                    <div class="row">
                        <div class="posts-masonry">

                            @foreach ($blogs as $blog)
                            <!-- Blog Post-->
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="blog-post">
                                    <div class="post-img">
                                        <a href="{{ route('blog.detail', $blog->slug) }}"> <img class="img-responsive"
                                                alt="" src="{{ asset('admin-manage/Uploads/' . $blog->image) }}"> </a>
                                    </div>
                                    <div class="post-info"> <a href="#">{{ $blog->created_at->format('M d, Y') }}</a>
                                    </div>
                                    <h3 class="post-title"> <a href="#"> {{ $blog->title }} </a> </h3>
                                    <p class="post-excerpt"> {{ $blog->short_description }} <a
                                            href="{{ route('blog.detail', $blog->slug) }}"><strong>Read
                                                More</strong></a>
                                    </p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <!-- Middle Content Box End -->
            </div>
            <!-- Row End -->
        </div>
        <!-- Main Container End -->
    </section>

    @endsection
