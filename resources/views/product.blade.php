@extends('layouts.header')

@section('title', 'All Jeeps & SUV Jeeps | Customization Jeeps | Rabdeep Motors')
@section('description', 'Explore Jeep and SUV products at Rabdeep Motors, including premium accessories, wheels, lighting, exterior styling, interior upgrades and customization options.')

@section('content')
<style>
    .custom-padding {
    padding: 30px 0 60px 0;
    background-color: #f5f5f5;
}
</style>
<!-- =-=-=-=-=-=-= Breadcrumb =-=-=-=-=-=-= -->
<div class="page-header-area-2 gray">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="small-breadcrumb">
                    <div class=" breadcrumb-link">
                        <ul>
                            <li><a href="{{ route('index') }}">Home</a></li>
                            <li><a class="active" href="{{ route('product') }}">Jeeps</a></li>
                        </ul>
                    </div>
                    <div class="header-page">
                        <h1>Our Latest Jeeps</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- =-=-=-=-=-=-= Breadcrumb End =-=-=-=-=-=-= -->
<!-- =-=-=-=-=-=-= Main Content Area =-=-=-=-=-=-= -->
<div class="main-content-area clearfix">
    <!-- =-=-=-=-=-=-= Trending Ads =-=-=-=-=-=-= -->
    <section class="custom-padding white">
        <!-- Main Container -->
        <div class="container">
            @foreach ($categories as $category)
            <!-- Only show if the category has products -->
            @if ($category->products->count() > 0)
            <!-- Row for Category: {{ $category->name }} -->
            <div class="row" style="margin-bottom: 20px;">

                <!-- Heading Area -->
                <div class="heading-panel">
                    <div class="col-xs-12 col-md-12 col-sm-12 text-center">
                        <!-- Dynamic Main Title -->
                        <h1> <span class="heading-color"> {{ $category->name }}</span></h1>
                    </div>
                </div>

                <!-- Middle Content Box -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="category-{{ $category->id }}">

                        <!-- Loop through the products of THIS category -->
                        @foreach ($category->products as $product)
                        <!-- Listing Ad Grid -->
                        <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                            <div class="white category-grid-box-1">

                                <!-- Product Image -->
                                <div class="image">
                                    <img alt="{{ $product->product_name }}"
                                        src="{{ asset('admin-manage/Uploads/' . $product->product_image1) }}" class="img-responsive"
                                        style="width: 100%; height: 280px; object-fit: cover;">
                                </div>

                                <!-- Product Short Description -->
                                <div class="short-description-1">

                                    <div class="category-title">
                                        <span>
                                            <a href="#">
                                                {{ $category->name }} <!-- Dynamic Category Name -->
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

                                <!-- Product Information -->
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
                <!-- Middle Content Box End -->
            </div>
            <!-- Row End -->
            @endif
            @endforeach
        </div>
        <!-- Main Container End -->
    </section>
    <!-- =-=-=-=-=-=-= Trending Ads End =-=-=-=-=-=-= -->
    @endsection
