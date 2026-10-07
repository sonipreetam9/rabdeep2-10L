<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="ScriptsBundle">
    <title>@yield('title')</title>
    <meta name="description" content="@yield('description')">
    <!-- <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon" /> -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <link rel="stylesheet" href="{{ asset('css/font-awesome.css') }}" type="text/css">
    <link href="{{ asset('css/flaticon.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/et-line-fonts.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/carspot-menu.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/animate.min.css') }}" type="text/css">
    <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/nouislider.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/slider.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/owl.carousel.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/owl.theme.css') }}">
    <link href="{{ asset('skins/minimal/minimal.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/jquery.fancybox.min.css') }}" type="text/css" media="screen" />
    <link href="{{ asset('css/responsive-media.css') }}" rel="stylesheet">
    <link rel="stylesheet" id="color" href="{{ asset('css/colors/defualt.css') }}">
    <link rel="stylesheet" href="{{ asset('js/masterslider/style/masterslider.css') }}" />
    <link rel="stylesheet" href="{{ asset('js/masterslider/skins/default/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('js/masterslider/style/style.css') }}" />
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600%7CSource+Sans+Pro:400,400i,600"
        rel="stylesheet">

    <link rel="icon" type="image/png" href="{{ asset('images/favicon/favicon-96x96.png') }}" sizes="96x96" />
    <link rel="icon" type="image/svg+xml" href="{{ asset('images/favicon/favicon.svg') }}" />
    <link rel="shortcut icon" href="{{ asset('images/favicon/favicon.ico') }}" />
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/favicon/apple-touch-icon.png') }}" />
    <link rel="manifest" href="{{ asset('images/favicon/site.webmanifest') }}" />

    <!-- JavaScripts -->
    <!-- <script src="{{ asset('js/modernizr.js') }}"></script>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script> -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">


    <style>
        body {
            color: black;
        }

        .popular-cars-section {
            padding: 20px 0;
        }

        .accessory-content h3 {
            margin: 4px 0 6px;
            font-size: 14px;
            font-weight: 600;
            color: black;
        }

        .custom-padding {
            padding: 90px 0 60px 0;
            background-color: #f5f5f5;
        }

        .footer-top .widget.my-quicklinks ul li a {
            color: #000000;
        }



        .banner-text {
            background-color: white;
            padding: 0px 10px;
            border-radius: 0px 15px;
        }

        .floating-action-menu {
            position: fixed;
            bottom: 50px;
            left: 50px;
            display: flex;
            flex-direction: column;
            gap: 20px;
            z-index: 99999;
        }

        .float-btn {
            width: 60px;
            height: 60px;
            background-color: #ffffff;
            border-radius: 50%;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            text-decoration: none;
        }

        .float-btn img {
            width: 60%;
            height: auto;
            object-fit: contain;
            transition: transform 0.3s ease;
        }

        .float-btn:hover {
            transform: translateY(-8px) scale(1.1);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.3);
            text-decoration: none;
        }

        .float-btn:hover img {
            transform: scale(1.15);
        }

        /* =========================================
   WHATSAPP PULSE
========================================= */

        .whatsapp-btn {
            animation: pulse-glow 2s infinite;
        }

        .whatsapp-btn:hover {
            animation: none;
            transform: translateY(-8px) scale(1.1);
            box-shadow: 0 12px 24px rgba(37, 211, 102, 0.45);
        }

        /* =========================================
   PULSE ANIMATION
========================================= */

        @keyframes pulse-glow {
            0% {
                box-shadow: 0 0 0 0 rgba(37, 211, 102, 0.7);
            }

            70% {
                box-shadow: 0 0 0 15px rgba(37, 211, 102, 0);
            }

            100% {
                box-shadow: 0 0 0 0 rgba(37, 211, 102, 0);
            }
        }

        /* =========================================
   MOBILE
========================================= */

        @media screen and (max-width: 600px) {
            .floating-action-menu {
                bottom: 35px;
                left: 20px;
            }

            .float-btn {
                width: 50px;
                height: 50px;
            }
        }
    </style>
</head>

<body>
    <!-- =-=-=-=-=-=-= Preloader =-=-=-=-=-=-= -->
    <div class="preloader"></div>

    <!-- =-=-=-=-=-=-=  Header =-=-=-=-=-=-= -->
    <div class="colored-header">
        <!-- Top Bar -->
        <div class="header-top">
            <div class="container">
                <div class="row">
                    <!-- Header Top Left -->
                    <div class="header-top-left col-md-8 col-sm-6 col-xs-12 hidden-xs">
                        <ul class="listnone">
                            <li>
                                <a href="{{ route('index') }}">
                                    <i class="fa fa-heart-o" aria-hidden="true"></i>
                                    Welcome to Rabdeep Motors Jeeps – Your Trusted Jeep Dealer in Mandi Dabwali
                                </a>
                            </li>


                        </ul>
                    </div>
                    <!-- Header Top Right Social -->
                    <div class="header-right col-md-4 col-sm-6 col-xs-12 ">
                        <div class="pull-right">
                            <ul class="listnone">

                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                        aria-haspopup="true" aria-expanded="false"><i class="fa fa-globe"
                                            aria-hidden="true"></i> Language <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">English</a></li>
                                        <li><a href="#">Swedish</a></li>
                                        <li><a href="#">Arabic</a></li>
                                        <li><a href="#">Russian</a></li>
                                        <li><a href="#">chinese</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Top Bar End -->
        <!-- Navigation Menu -->
        <div class="clearfix"></div>
        <!-- menu start -->
        <nav id="menu-1" class="mega-menu">
            <!-- menu list items container -->
            <section class="menu-list-items">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <!-- menu logo -->
                            <ul class="menu-logo">
                                <li>
                                    <a href="{{ route('index') }}"><img src="{{ asset('images/logo.png') }}" alt="logo"> </a>
                                </li>
                            </ul>
                            <!-- menu links -->
                            <ul class="menu-links">
                                <!-- active class -->
                                <li>
                                    <a href="{{ route('index') }}">Home</a>
                                </li>
                                <li>
                                    <a href="{{ route('about') }}">About</a>
                                </li>
                                <li>
                                    <a href="{{ route('product') }}">Products</a>
                                </li>
                                <li>
                                    <a href="{{ route('portfolio') }}">Portfolio</a>
                                </li>
                                <li>
                                    <a href="{{ route('accessories') }}">Accessories</a>
                                </li>
                                <li>
                                    <a href="{{ route('gallery') }}">Gallery</a>
                                </li>
                                <li>
                                    <a href="{{ route('blog') }}">Blog</a>
                                </li>
                                <!-- <li>
                                    <a href="javascript:void(0)"> Cars <i class="fa fa-angle-down fa-indicator"></i></a>
                                    <div class="drop-down grid-col-12">
                                        <div class="grid-row">
                                            <div class="grid-col-2">
                                                <h3>Condition</h3>
                                                <ul>
                                                    <li><a href="listing.html">New</a></li>
                                                    <li><a href="listing-4.html">Used</a></li>
                                                    <li><a href="listing-3.html">Reconditioned </a></li>
                                                    <li><a href="#">Featured Cars </a></li>
                                                </ul>
                                            </div>
                                            <div class="grid-col-6">
                                                <h3>Brands</h3>
                                                <ul class="by-make list-inline">
                                                    <li>
                                                        <a href="#">
                                                            <img src="images/brands/1.png" class="img-responsive"
                                                                alt="Brand Image">
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <img src="images/brands/2.png" class="img-responsive"
                                                                alt="Brand Image">
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <img src="images/brands/3.png" class="img-responsive"
                                                                alt="Brand Image">
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <img src="images/brands/4.png" class="img-responsive"
                                                                alt="Brand Image">
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <img src="images/brands/5.png" class="img-responsive"
                                                                alt="Brand Image">
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <img src="images/brands/6.png" class="img-responsive"
                                                                alt="Brand Image">
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <img src="images/brands/7.png" class="img-responsive"
                                                                alt="Brand Image">
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <img src="images/brands/8.png" class="img-responsive"
                                                                alt="Brand Image">
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <img src="images/brands/9.png" class="img-responsive"
                                                                alt="Brand Image">
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <img src="images/brands/11.png" class="img-responsive"
                                                                alt="Brand Image">
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="grid-col-4">
                                                <h3>Body Type</h3>
                                                <ul class="list-inline by-category ">
                                                    <li>
                                                        <a href="#">
                                                            <img alt="Hybrid" src="images/bodytype/1.png">
                                                            Convertible
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <img alt="Hybrid" src="images/bodytype/2.png">
                                                            Coupe
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <img alt="Hybrid" src="images/bodytype/3.png">
                                                            Sedan
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <img alt="Hybrid" src="images/bodytype/4.png">
                                                            Van/Minivan
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <img alt="Hybrid" src="images/bodytype/5.png">
                                                            Truck
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <img alt="Hybrid" src="images/bodytype/6.png">
                                                            Hybrid
                                                        </a>
                                                    </li>

                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                 <li>
                                    <a href="javascript:void(0)">Listing <i
                                            class="fa fa-angle-down fa-indicator"></i></a>
                                    <ul class="drop-down-multilevel">
                                        <li>
                                            <a href="javascript:void(0)">Grid Style<i
                                                    class="fa fa-angle-right fa-indicator"></i> </a>
                                            <ul class="drop-down-multilevel">
                                                <li><a href="listing.html"> Grid Style (Defualt)</a></li>
                                                <li><a href="listing-1.html"> Grid Style 1</a></li>
                                                <li><a href="listing-2.html"> Grid Style 2</a></li>
                                                <li><a href="listing-3.html"> Grid Style 3</a></li>
                                                <li><a href="listing-4.html"> Grid Style 4</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)">List Style<i
                                                    class="fa fa-angle-right fa-indicator"></i> </a>
                                            <ul class="drop-down-multilevel">
                                                <li><a href="#">List View 1</a></li>
                                                <li><a href="listing-6.html">List View 2</a></li>
                                                <li><a href="listing-7.html">List View 3</a></li>
                                                <li><a href="listing-8.html">List View 4</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)">Single Ad<i
                                                    class="fa fa-angle-right fa-indicator"></i></a>
                                            <ul class="drop-down-multilevel">
                                                <li><a href="single-page-listing.html">Single Ad Detail</a></li>
                                                <li><a href="single-page-listing-1.html">Single Ad (Gallery)</a></li>
                                                <li><a href="single-page-listing-2.html">Single Ad (Gallery 2)</a></li>
                                                <li><a href="single-page-listing-3.html">Single Ad Variation</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="icons.html">Template Icons </a></li>
                                    </ul>
                                </li> -->
                                <!-- <li>
                                    <a href="javascript:void(0)">Reviews <i
                                            class="fa fa-angle-down fa-indicator"></i></a>
                                    <ul class="drop-down-multilevel">
                                        <li><a href="reviews.html">Expert Reviews</a></li>
                                        <li><a href="review-detail.html">Review Detial</a></li>
                                    </ul>
                                </li> -->

                                <!-- <li>
                                    <a href="javascript:void(0)">Dashboard <i
                                            class="fa fa-angle-down fa-indicator"></i></a>
                                    <ul class="drop-down-multilevel">
                                        <li><a href="profile.html">User Profile</a></li>
                                        <li><a href="archives.html">Archives</a></li>
                                        <li><a href="active-ads.html">Active Ads</a></li>
                                        <li><a href="favourite.html">Favourite Ads</a></li>
                                        <li><a href="messages.html">Message Panel</a></li>
                                        <li><a href="deactive.html">Account Deactivation</a></li>
                                    </ul>
                                </li> -->
                                <!-- <li>
                                    <a href="javascript:void(0)">Pages <i class="fa fa-angle-down fa-indicator"></i></a>
                                    <div class="drop-down grid-col-12">
                                        <div class="grid-row">
                                            <div class="grid-col-2">
                                                <h4>Blog</h4>
                                                <ul>
                                                    <li><a href="blog.html"> Right Sidebar</a></li>
                                                    <li><a href="blog-1.html"> Masonry Style</a></li>
                                                    <li><a href="blog-2.html"> Without Sidebar</a></li>
                                                    <li><a href="blog-details.html">Single Blog </a></li>
                                                </ul>
                                            </div>
                                            <div class="grid-col-2">
                                                <h4>Miscellaneous</h4>
                                                <ul>
                                                    <li><a href="about.html">About Us</a></li>
                                                    <li><a href="about-1.html">About Us 2</a></li>
                                                    <li><a href="cooming-soon.html">Comming Soon</a></li>
                                                    <li><a href="elements.html">Shortcodes</a></li>
                                                </ul>
                                            </div>
                                            <div class="grid-col-2">
                                                <h4>Others</h4>
                                                <ul>
                                                    <li><a href="error.html">404 Page</a></li>
                                                    <li><a href="faqs.html">FAQS</a></li>
                                                    <li><a href="login.html">Login</a></li>
                                                    <li><a href="register.html">Register</a></li>
                                                </ul>
                                            </div>
                                            <div class="grid-col-2">
                                                <h4>Extra Page</h4>
                                                <ul>
                                                    <li><a href="post-ad-1.html">Post Ad</a></li>
                                                    <li><a href="pricing.html">Pricing</a></li>
                                                    <li><a href="site-map.html">Site Map</a></li>
                                                    <li><a href="contact.html">Contact Us</a></li>
                                                </ul>
                                            </div>
                                            <div class="grid-col-2">
                                                <h4>Services Page</h4>
                                                <ul>
                                                    <li><a href="services.html">Services</a></li>
                                                    <li><a href="services-1.html">Services 2</a></li>
                                                    <li><a href="profile.html">Profile</a></li>
                                                    <li><a href="messages.html">Messages</a></li>
                                                </ul>
                                            </div>
                                            <div class="grid-col-2">
                                                <h4>Trending</h4>
                                                <ul>
                                                    <li><a href="reviews.html">Reviews</a></li>
                                                    <li><a href="review-detail.html">Review Detail</a></li>
                                                    <li><a href="compare.html">Compare</a></li>
                                                    <li><a href="compare-2.html">Comapre Detail</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </li>  -->
                                <li>
                                    <a href="{{ route('contact') }}">Contact </a>
                                </li>
                            </ul>
                            <ul class="menu-search-bar">
                                <li>
                                    <a href="tel:{{ $CompanyPhone1 }}" class="btn btn-theme" target="_blank">Call
                                        Now</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
        </nav>
        <!-- menu end -->
    </div>
    @yield('content')
    @include('layouts.footer')
