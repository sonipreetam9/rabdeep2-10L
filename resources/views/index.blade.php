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

    <!-- end of slide -->

    @for($i=1;$i<=10;$i++)


        <div class="ms-slide slide-1" data-delay="4">
        <div class="ms-overlay-layers"></div>
        <!-- slide background -->
        <img src="{{ asset('js/masterslider/style/blank.gif') }}"
            data-src="{{ asset('images/slider2/' . $i . '.jpeg') }}" alt="Slide1 background" />
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
@endfor


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
                    <a href="{{ route('accessories') }}" class="search-best-card" target="_blank"
                        rel="noopener noreferrer">
                        <div class="search-card-icon modified-icon">
                            <!-- Google G Logo -->
                            <i class="fa fa-lightbulb-o"></i>
                        </div>
                        <h3>
                            Jeep Accessories
                        </h3>
                        <p>
                            View Shop
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
                    <a href="{{ route('product') }}" class="search-best-card">
                        <div class="search-card-icon deals-icon">
                            <i class="fa-solid fa-car"></i>
                        </div>
                        <h3>View Jeeps</h3>
                        <p>Jeep View</p>
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
                <a href="{{ route('product') }}" class="view-all-link">VIEW ALL ></a>
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


    <section class="custom-padding white">
        <div class="container">

            @php
            $category = $categories->first();
            @endphp

            @if ($category && $category->products->count() > 0)

            <div class="row" style="margin-bottom: 20px;">

                <div class="heading-panel">
                    <div class="col-xs-12 col-md-12 col-sm-12 text-center">
                        <h1>
                            <span class="heading-color">
                                {{ $category->name }}
                            </span>
                        </h1>
                    </div>
                </div>

                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active">

                        @foreach ($category->products->take(6) as $product)

                        <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                            <div class="white category-grid-box-1">

                                <div class="image">
                                    <img
                                        alt="{{ $product->product_name }}"
                                        src="{{ asset('admin-manage/Uploads/' . $product->product_image1) }}"
                                        class="img-responsive"
                                        style="width: 100%; height: 280px; object-fit: cover;">
                                </div>

                                <div class="short-description-1">

                                    <div class="category-title">
                                        <span>
                                            <a href="#">
                                                {{ $category->name }}
                                            </a>
                                        </span>
                                    </div>

                                    <h3>
                                        <a title="{{ $product->product_name }}"
                                            href="{{ route('product.details', ['slug' => $product->slug]) }}">
                                            {{ $product->product_name }}
                                        </a>
                                    </h3>

                                    <p class="location">
                                        <i class="fa fa-map-marker"></i>
                                        Sirsa Road, Dabwali, Haryana
                                    </p>

                                    <span class="ad-price">
                                        ₹{{ $product->product_price }}
                                    </span>

                                </div>

                                <div class="ad-info-1">
                                    <ul>
                                        <li>
                                            <i class="flaticon-fuel-1"></i>
                                            {{ $product->fuel }}
                                        </li>
                                        <li>
                                            <i class="flaticon-dashboard"></i>
                                            {{ $product->tyre }}
                                        </li>
                                        <li>
                                            <i class="flaticon-engine-2"></i>
                                            {{ $product->engine }}
                                        </li>
                                    </ul>
                                </div>

                            </div>
                        </div>

                        @endforeach

                        <div class="clearfix"></div>

                    </div>
                </div>

            </div>

            @endif

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


                          @foreach ($reviews as $review)
    <div class="single_testimonial">
        <div class="textimonial-content">
            <h4>
                <img src="{{ asset('images/review.png') }}"
                     alt="Customer Review"
                     style="width:50px; object-fit:contain;">
                {{ $review->name }}
            </h4>

            <p>
                {{ $review->review }}
            </p>
        </div>

        <div class="testimonial-meta-box">
            <div class="testimonial-meta">
                @for ($i = 1; $i <= 5; $i++)
                    <i class="fa fa-star"
                       style="color: {{ $i <= $review->star ? '#ffc107' : '#ccc' }};">
                    </i>
                @endfor
            </div>
        </div>
    </div>
@endforeach




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
