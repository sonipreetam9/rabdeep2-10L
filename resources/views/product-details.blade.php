@extends('layouts.header')

@section('title', $product->product_name ?: $product->product_name)
@section('description', $product->product_short_description ?: $product->product_short_description)

@section('content')




   <div class="page-header-area-2 no-bottom gray">
      <div class="container">
         <div class="row">
            <div class="col-lg-12 no-padding col-md-12 col-sm-12 col-xs-12">
               <div class="small-breadcrumb">
                  <div class="col-md-12 col-xs-12 col-sm-12">
                     <div class="breadcrumb-link">
                        <ul>
                           <li>
                              <a href="{{ route('index') }}">Home</a>
                           </li>

                           <li>
                              <a class="active" href="{{ route('product.details', $product->slug) }}">
                                 {{ $product->product_name }}
                              </a>
                           </li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- Breadcrumb End -->


   <!-- Main Content -->
   <div class="main-content-area clearfix">

      <section class="section-padding no-top gray">

         <div class="container">

            <div class="row">

               <!-- Product Header -->
               <div class="pricing-area">

                  <div class="col-md-9 col-xs-12 col-sm-8">

                     <div class="heading-zone">

                        <h1>
                           {{ $product->product_name }}
                        </h1>

                        <div class="short-history">

                           <ul>

                              <li>
                                 <b>
                                    {{ optional($product->created_at)->format('M d, Y') }}
                                 </b>
                              </li>

                              @if(!empty($product->category_id))
                                 <li>
                                    Category:
                                    <b>
                                       {{ $product->category->category_name ?? 'Jeeps' }}
                                    </b>
                                 </li>
                              @endif

                           </ul>

                        </div>

                     </div>

                  </div>


                  <!-- Price -->
                  <div class="col-md-3 col-sm-4 detail_price col-xs-12">

                     <div class="singleprice-tag">

                        ₹ {{ $product->product_price }}


                     </div>

                  </div>

               </div>
               <!-- Product Header End -->


               <!-- Main Product -->
               <div class="col-md-8 col-xs-12 col-sm-12">

                  <div class="singlepage-detail">

                     <!-- Slider -->
                     <div id="single-slider" class="flexslider">

                        <ul class="slides">

                           @if(!empty($product->product_image1))
                              <li>
                                 <a href="{{ asset('admin-manage/Uploads/' . $product->product_image1) }}"
                                    data-fancybox="group">

                                    <img alt="{{ $product->product_name }}"
                                       src="{{ asset('admin-manage/Uploads/' . $product->product_image1) }}">

                                 </a>
                              </li>
                           @endif


                           @if(!empty($product->product_image2))
                              <li>
                                 <a href="{{ asset('admin-manage/Uploads/' . $product->product_image2) }}"
                                    data-fancybox="group">

                                    <img alt="{{ $product->product_name }}"
                                       src="{{ asset('admin-manage/Uploads/' . $product->product_image2) }}">

                                 </a>
                              </li>
                           @endif


                           @if(!empty($product->product_image3))
                              <li>
                                 <a href="{{ asset('admin-manage/Uploads/' . $product->product_image3) }}"
                                    data-fancybox="group">

                                    <img alt="{{ $product->product_name }}"
                                       src="{{ asset('admin-manage/Uploads/' . $product->product_image3) }}">

                                 </a>
                              </li>
                           @endif

                        </ul>

                     </div>


                     <!-- Thumbnail Slider -->
                     <div id="carousel" class="flexslider">

                        <ul class="slides">

                           @if(!empty($product->product_image1))
                              <li>
                                 <img alt="{{ $product->product_name }}"
                                    src="{{ asset('admin-manage/Uploads/' . $product->product_image1) }}">
                              </li>
                           @endif


                           @if(!empty($product->product_image2))
                              <li>
                                 <img alt="{{ $product->product_name }}"
                                    src="{{ asset('admin-manage/Uploads/' . $product->product_image2) }}">
                              </li>
                           @endif


                           @if(!empty($product->product_image3))
                              <li>
                                 <img alt="{{ $product->product_name }}"
                                    src="{{ asset('admin-manage/Uploads/' . $product->product_image3) }}">
                              </li>
                           @endif

                        </ul>

                     </div>


                     <!-- Key Features -->
                     <div class="key-features">

                        @if(!empty($product->fuel))
                           <div class="boxicon">
                              <i class="flaticon-gas-station-1 petrol"></i>
                              <p>{{ $product->fuel }}</p>
                           </div>
                        @endif


                        @if(!empty($product->tyre))
                           <div class="boxicon">
                              <i class="flaticon-dashboard-1 kilo-meter"></i>
                              <p>{{ $product->tyre }}</p>
                           </div>
                        @endif


                        @if(!empty($product->engine))
                           <div class="boxicon">
                              <i class="flaticon-tool engile-capacity"></i>
                              <p>{{ $product->engine }}</p>
                           </div>
                        @endif


                        @if(!empty($product->gear))
                           <div class="boxicon">
                              <i class="flaticon-gearshift transmission"></i>
                              <p>{{ $product->gear }}</p>
                           </div>
                        @endif


                        @if(!empty($product->paint))
                           <div class="boxicon">
                              <i class="flaticon-cogwheel-outline car-color"></i>
                              <p>{{ $product->paint }}</p>
                           </div>
                        @endif

                     </div>
                     <!-- Key Features End -->


                     <!-- Description -->
                     <div class="content-box-grid">

                        <div class="short-features">

                           <div class="heading-panel">

                              <h3 class="main-title text-left">
                                 Description
                              </h3>

                           </div>

                           @if(!empty($product->product_short_description))

                              <p>
                                 {{ $product->product_short_description }}
                              </p>

                           @endif


                           @if(!empty($product->product_long_description))

                              <div class="product-long-description">

                                 {!! $product->product_long_description !!}

                              </div>

                           @endif

                        </div>


                        <!-- Specifications -->
                        <div class="short-features">

                           <div class="specification">

                              <div class="heading-panel">

                                 <h3 class="main-title text-left">
                                    Specifications
                                 </h3>

                              </div>

                              <div class="table-responsive">

                                 <table class="table table-bordered">

                                    <tbody>

                                       <tr>
                                          <th>Product Name</th>
                                          <td>{{ $product->product_name }}</td>
                                       </tr>

                                       @if(!empty($product->engine))
                                          <tr>
                                             <th>Engine</th>
                                             <td>{{ $product->engine }} cc</td>
                                          </tr>
                                       @endif

                                       @if(!empty($product->tyre))
                                          <tr>
                                             <th>Tyre</th>
                                             <td>{{ $product->tyre }}</td>
                                          </tr>
                                       @endif

                                       @if(!empty($product->paint))
                                          <tr>
                                             <th>Paint</th>
                                             <td>{{ $product->paint }}</td>
                                          </tr>
                                       @endif

                                       @if(!empty($product->gear))
                                          <tr>
                                             <th>Gear</th>
                                             <td>{{ $product->gear }}</td>
                                          </tr>
                                       @endif

                                       @if(!empty($product->fuel))
                                          <tr>
                                             <th>Fuel</th>
                                             <td>{{ $product->fuel }}</td>
                                          </tr>
                                       @endif

                                       <tr>
                                          <th>Price</th>
                                          <td>
                                             ₹ {{ $product->product_price }}
                                          </td>
                                       </tr>

                                    </tbody>

                                 </table>

                              </div>

                           </div>

                        </div>

                        <div class="clearfix"></div>

                     </div>

                  </div>
                  <!-- Single Ad End -->


                  <!-- Related Ads -->
                  @if(isset($relatedProducts) && $relatedProducts->count())

                     <div class="grid-panel margin-top-30">

                        <div class="heading-panel">

                           <div class="col-xs-12 col-md-12 col-sm-12">

                              <h3 class="main-title text-left">
                                 Related Ads
                              </h3>

                           </div>

                        </div>


                        <div class="col-md-12 col-xs-12 col-sm-12">

                           <div class="posts-masonry">

                              @foreach($relatedProducts as $related)

                                 <div class="ads-list-archive">

                                    <div class="col-lg-5 col-md-5 col-sm-5 no-padding">

                                       <div class="ad-archive-img">

                                          <a href="{{ route('product-details', $related->slug) }}">

                                             <img class="img-responsive"
                                                src="{{ asset('admin-manage/Uploads/' . $related->product_image1) }}"
                                                alt="{{ $related->product_name }}">

                                          </a>

                                       </div>

                                    </div>


                                    <div class="clearfix visible-xs-block"></div>


                                    <div class="col-lg-7 col-md-7 col-sm-7 no-padding">

                                       <div class="ad-archive-desc">

                                          <div class="ad-price">
                                             ₹ {{ number_format((float) $related->product_price) }}
                                          </div>

                                          <h3>

                                             <a href="{{ route('product-details', $related->slug) }}">

                                                {{ $related->product_name }}

                                             </a>

                                          </h3>


                                          <div class="category-title">

                                             <span>
                                                <a href="#">
                                                   Home
                                                </a>
                                             </span>

                                          </div>


                                          <p class="hidden-sm">

                                             {{ Str::limit(strip_tags($related->product_short_description), 120) }}

                                          </p>


                                          <div class="archive-history">

                                             <div class="last-updated">

                                                Last Updated:
                                                {{ optional($related->updated_at)->diffForHumans() }}

                                             </div>

                                             <div class="ad-meta">

                                                <a class="btn btn-success" href="{{ route('product-details', $related->slug) }}">

                                                   <i class="fa fa-eye"></i>
                                                   View Details

                                                </a>

                                             </div>

                                          </div>

                                       </div>

                                    </div>

                                 </div>

                              @endforeach

                           </div>

                        </div>

                     </div>

                  @endif
                  <!-- Related Ads End -->

               </div>


               <!-- Right Sidebar -->
               <div class="col-md-4 col-xs-12 col-sm-12">

                  <div class="sidebar">

                     <!-- Email -->
                     <div class="category-list-icon">

                        <i class="green flaticon-mail-1"></i>

                        <div class="category-list-title">

                           <h5>

                              <a href="#" data-toggle="modal" data-target=".price-quote">

                                 Contact Seller Via Email

                              </a>

                           </h5>

                        </div>

                     </div>


                     <!-- Phone -->
                     <div class="category-list-icon">

                        <i class="purple flaticon-smartphone"></i>

                        <div class="category-list-title">

                           <h5>

                              <a href="tel:{{ $CompanyPhone1 }}" class="number">

                                 Contact Seller

                              </a>

                           </h5>

                        </div>

                     </div>


                     <!-- Recent Products -->
                     @if(isset($recentProducts) && $recentProducts->count())

                        <div class="widget">

                           <div class="widget-heading">

                              <h4 class="panel-title">
                                 <a>Recent Products</a>
                              </h4>

                           </div>


                           <div class="widget-content recent-ads">

                              @foreach($recentProducts as $recent)

                                 <div class="recent-ads-list">

                                    <div class="recent-ads-container">

                                       <div class="recent-ads-list-image">

                                          <a href="{{ route('product-details', $recent->slug) }}"
                                             class="recent-ads-list-image-inner">

                                             <img src="{{ asset('admin-manage/Uploads/' . $recent->product_image1) }}"
                                                alt="{{ $recent->product_name }}">

                                          </a>

                                       </div>


                                       <div class="recent-ads-list-content">

                                          <h3 class="recent-ads-list-title">

                                             <a href="{{ route('product-details', $recent->slug) }}">

                                                {{ $recent->product_name }}

                                             </a>

                                          </h3>


                                          <div class="recent-ads-list-price">

                                             ₹ {{ number_format((float) $recent->product_price) }}

                                          </div>

                                       </div>

                                    </div>

                                 </div>

                              @endforeach

                           </div>

                        </div>

                     @endif


                     <!-- Safety Tips -->
                     <div class="widget">

                        <div class="widget-heading">

                           <h4 class="panel-title">
                              <a>Safety tips for deal</a>
                           </h4>

                        </div>

                        <div class="widget-content saftey">

                           <ol>

                              <li>Use a safe location to meet seller</li>

                              <li>Avoid cash transactions</li>

                              <li>Beware of unrealistic offers</li>

                           </ol>

                        </div>

                     </div>

                  </div>

               </div>
               <!-- Right Sidebar End -->

            </div>

         </div>

      </section>

   </div>

@endsection