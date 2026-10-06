@extends('layouts.header')
@section('title', 'Jeep Accessories | Rabdeep Motors')
@section('description', 'Explore Jeep and SUV accessories at Rabdeep Motors including alloy wheels, LED lights, bumpers, grilles, interiors, off-road accessories and custom styling products.')
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
                                    <a href="{{ route('index') }}">
                                        Home
                                    </a>
                                </li>

                                <li>
                                    <a class="active" href="{{ route('accessories') }}">
                                        Accessories
                                    </a>
                                </li>

                            </ul>

                        </div>

                        <div class="header-page">

                            <h1>
                                Jeep Accessories
                            </h1>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <!-- ==========================================
                                    ACCESSORIES SECTION
                    ========================================== -->

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
                        $whatsappMessage = 'Hello Rabdeep Motors, I am interested in ' . $item->title . '. Price: ₹' . $item->price;
                    @endphp


                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 accessory-item" data-category="{{ $category }}">

                        <div class="accessory-card">


                            <!-- IMAGE -->

                            <div class="accessory-image">
                                <img src="{{ $image }}" alt="{{ $item->title }}" class="img-responsive">
                                <span class="accessory-badge">
                                    {{ ucfirst($item->category) }}
                                </span>
                                <a href="{{ $image }}" class="accessory-zoom" target="_blank" title="View {{ $item->title }}">
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

    <section class="accessories-cta">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-8 col-xs-12">
                    <h2>
                        Looking For A Specific Jeep Accessory?
                    </h2>
                    <p>
                        Tell us what you want to install or customize
                        and our team will help you find the right option
                        for your Jeep.
                    </p>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12 text-right">
                    <a href="{{ route('contact') }}" class="btn-theme btn-lg btn">
                        Enquire Now
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <script>

        document.addEventListener('DOMContentLoaded', function () {

            const filters = document.querySelectorAll('.accessory-filter');
            const items = document.querySelectorAll('.accessory-item');

            filters.forEach(function (filter) {
                filter.addEventListener('click', function () {
                    const selectedCategory =
                        this.getAttribute('data-filter').toLowerCase();

                    filters.forEach(function (button) {
                        button.classList.remove('active');
                    });

                    this.classList.add('active');

                    items.forEach(function (item) {
                        const itemCategory =
                            (item.getAttribute('data-category') || '').toLowerCase();
                        if (
                            selectedCategory === 'all' ||
                            selectedCategory === itemCategory
                        ) {
                            item.style.display = '';
                        } else {
                            item.style.display = 'none';
                        }
                    });
                });
            });
        });
    </script>
@endsection