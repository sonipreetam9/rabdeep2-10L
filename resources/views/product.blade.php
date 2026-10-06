@extends('layouts.header')

@section('title', 'All Jeeps & SUV Jeeps | Customization Jeeps | Rabdeep Motors')
@section('description', 'Explore Jeep and SUV products at Rabdeep Motors, including premium accessories, wheels, lighting, exterior styling, interior upgrades and customization options.')

@section('content')

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
                     <h1>Our Latest Provie Jeeps</h1>
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
            <!-- Row -->
            <div class="row">
               <!-- Heading Area -->
               <div class="heading-panel">
                  <div class="col-xs-12 col-md-12 col-sm-12 text-center">
                     <!-- Main Title -->
                     <h1>Latest <span class="heading-color"> Trending</span> Jeeps</h1>
                  </div>
               </div>
               <!-- Middle Content Box -->

               <!-- Recently Listed New Cars -->
               <div class="tab-content">
                  <div role="tabpanel" class="tab-pane active" id="newcars">

                     @foreach ($products as $product)
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
                                          Jeeps
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
                     <!-- Listing Ad Grid -->
                     <div class="clearfix"></div>

                     <!-- Middle Content Box End -->
                  </div>
               </div>
               <!-- Middle Content Box End -->
            </div>
            <!-- Row End -->
         </div>
         <!-- Main Container End -->
      </section>
      <!-- =-=-=-=-=-=-= Trending Ads End =-=-=-=-=-=-= -->
@endsection