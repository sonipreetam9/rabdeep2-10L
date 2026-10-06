@extends('layouts.header')

@section('title', 'Gallery | Rabdeep Motors - Modified Jeeps')

@section('description', 'Explore the Rabdeep Motors gallery featuring modified Jeeps, custom vehicle builds, interiors,
exteriors, wheels and Jeep customization work.')

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
                           <a class="active" href="{{ route('gallery') }}">
                              Gallery
                           </a>
                        </li>

                     </ul>

                  </div>


                  <div class="header-page">

                     <h1>
                        Gallery
                     </h1>

                  </div>

               </div>

            </div>

         </div>

      </div>

   </div>



   <!-- ==========================================
                          GALLERY SECTION
                     ========================================== -->
   <section class="custom-padding rabdeep-gallery">

      <div class="container">


         <!-- ======================================
                                  HEADING
                             ======================================= -->
         <div class="row">

            <div class="col-md-12 text-center">

               <div class="heading-panel">

                  <h1>

                     Our
                     <span class="heading-color">
                        Gallery
                     </span>

                  </h1>

               </div>

            </div>

         </div>


         <!-- ======================================
                                  GALLERY GRID
                             ======================================= -->
         <div class="row gallery-grid">

            @foreach ($gallery as $item)
               <!-- IMAGE 1 -->
               <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 gallery-item" data-category="">
                  <div class="gallery-card">
                     <img src="{{ asset('admin-manage/Uploads/' . $item->image) }}" alt="Modified Jeep Rabdeep Motors"
                        class="img-responsive">
                     <div class="gallery-overlay">
                        <div class="gallery-overlay-content">
                           <span>
                              Modified Jeep
                           </span>
                           <h3>
                              Custom Jeep Build
                           </h3>
                           <a href="{{ asset('admin-manage/Uploads/' . $item->image) }}" class="gallery-popup"
                              data-gallery="rabdeep-gallery">
                              <i class="fa fa-search-plus"></i>
                           </a>
                        </div>
                     </div>
                  </div>
               </div>
            @endforeach
         </div>
      </div>
   </section>



   <!-- ==========================================
                          GALLERY CTA
                     ========================================== -->
   <section class="gallery-cta">

      <div class="container">

         <div class="row">

            <div class="col-md-8 col-sm-8 col-xs-12">

               <h2>
                  Build Your Dream Jeep With Us
               </h2>

               <p>
                  Have a Jeep modification idea?
                  Talk to Rabdeep Motors about your custom build.
               </p>

            </div>


            <div class="col-md-4 col-sm-4 col-xs-12 text-right">

               <a href="tel:{{ $CompanyPhone1 }}" class="btn-theme btn-lg btn">
                  Call Now
                  <i class="fa fa-angle-right"></i>
               </a>

            </div>

         </div>

      </div>

   </section>


@endsection