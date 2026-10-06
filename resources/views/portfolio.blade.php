@extends('layouts.header')

@section('title', 'Delivered Jeeps | Modified & Customized Jeeps | Rabdeep Motors')
@section('description', 'Explore Jeeps delivered by Rabdeep Motors, including modified, customized and professionally built Jeep vehicles. View our latest Jeep builds and customization projects.')

@section('content')

    <!-- ==========================================
                                             PAGE HEADER
                                        ========================================== -->
    <div class="page-header-area-2 gray">
        <div class="container">

            <div class="row">

                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                    <div class="small-breadcrumb">

                        <div class="breadcrumb-link">

                            <ul>
                                <li>
                                    <a href="{{ route('index') }}">Home</a>
                                </li>

                                <li>
                                    <a class="active" href="{{ route('portfolio') }}">
                                        Delivered Jeeps
                                    </a>
                                </li>
                            </ul>

                        </div>

                        <div class="header-page">
                            <h1>Delivered Jeeps</h1>
                        </div>

                    </div>

                </div>

            </div>

        </div>
    </div>


    <!-- ==========================================
                                    PORTFOLIO GRID
                               ========================================== -->

    <section class="custom-padding portfolio-section">

        <div class="container">

            <!-- Heading -->

            <div class="row">

                <div class="col-md-12 text-center">
                    <div class="heading-panel">
                        <h1>
                            Our
                            <span class="heading-color">
                                Delivered Jeeps
                            </span>
                        </h1>
                    </div>
                </div>
            </div>


            <!-- Portfolio -->

            <div class="row portfolio-grid">

                @forelse($portfolios as $portfolio)

                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 portfolio-item">

                        <div class="portfolio-card">
                            <!-- IMAGE -->
                            <div class="portfolio-image">
                                <img src="{{ asset('admin-manage/Uploads/' . $portfolio->image) }}"
                                    alt="{{ $portfolio->title }} - Rabdeep Motors" class="img-responsive">
                                <!-- Image Overlay -->
                                <div class="portfolio-overlay">
                                    <a href="{{ asset('admin-manage/Uploads/' . $portfolio->image) }}" class="portfolio-view"
                                        data-lightbox="portfolio" data-title="{{ $portfolio->title }}">
                                        <i class="fa fa-search-plus"></i>
                                    </a>
                                </div>
                            </div>

                            <!-- JEEP NAME -->
                            <div class="portfolio-content">
                                <h3>
                                    {{ $portfolio->title }}
                                </h3>
                                <div class="portfolio-bottom">
                                    <span>
                                        <i class="fa fa-check-circle"></i>
                                        Delivered
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty

                    <div class="col-md-12 text-center">
                        <p>
                            No delivered Jeeps available at the moment.
                        </p>
                    </div>

                @endforelse

            </div>

        </div>

    </section>


    <!-- ==========================================
    CTA SECTION
    ========================================== -->
    <section class="portfolio-cta">

        <div class="container">

            <div class="row">

                <div class="col-md-8 col-sm-8 col-xs-12">

                    <h2>
                        Want Your Jeep To Look Different?
                    </h2>

                    <p>
                        Talk to Rabdeep Motors and create a Jeep
                        according to your style and requirements.
                    </p>

                </div>


                <div class="col-md-4 col-sm-4 col-xs-12 text-right">

                    <a href="{{ route('contact') }}" class="btn-theme btn-lg btn">

                        Contact Us
                        <i class="fa fa-angle-right"></i>

                    </a>

                </div>

            </div>

        </div>

    </section>


@endsection