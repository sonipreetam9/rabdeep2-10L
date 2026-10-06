@extends('layouts.header')

@section('title', 'About Us | Rabdeep Motors - Modified Jeeps')
@section('description', 'Rabdeep Motors specializes in modified Jeeps, custom-built cars, performance upgrades, luxury
modifications and personalized Jeep customization in Mandi Dabwali, Haryana.')
@section('content')

   <!-- ==============================
           PAGE HEADER / BREADCRUMB
      ================================== -->
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
                           <a class="active" href="{{ route('about') }}">
                              About Us
                           </a>
                        </li>
                     </ul>
                  </div>

                  <div class="header-page">
                     <h1>About Us</h1>
                  </div>

               </div>

            </div>
         </div>
      </div>
   </div>


   <!-- ==============================
           ABOUT RABDEEP MOTORS
      ================================== -->
   <div class="main-content-area clearfix">
      <section class="custom-padding about-us">
         <div class="container">
            <div class="row">
               <!-- LEFT CONTENT -->
               <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                  <div class="title">
                     <h3> {{ $about->title }} </h3>
                  </div>
                  <div class="content">
                     <p class="service-summary">
                        {{ $about->short_about }}
                     </p>
                     {!! $about->long_about !!}
                  </div>
               </div>

               <!-- RIGHT IMAGE -->
               <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                  <img class="wow slideInRight center-block img-responsive" data-wow-delay="0ms" data-wow-duration="2000ms"
                     src="{{ asset('images/about.webp') }}" alt="Rabdeep Motors Modified Jeep">
               </div>
            </div>


            <!-- ==============================
                       WHAT WE OFFER
                  ================================== -->
            <div class="row margin-top-20">

               <div class="col-md-3 col-sm-6 col-xs-12">

                  <div class="services-grid">

                     <div class="icons">
                        <i class="flaticon-key"></i>
                     </div>

                     <h4>Custom-Built Cars</h4>

                     <p>
                        Experience power, style and precision with our
                        professionally modified and custom-built vehicles.
                     </p>

                  </div>

               </div>


               <div class="col-md-3 col-sm-6 col-xs-12">

                  <div class="services-grid">

                     <div class="icons">
                        <i class="flaticon-engine-2"></i>
                     </div>

                     <h4>Performance Upgrades</h4>

                     <p>
                        Upgrade your vehicle with performance-focused
                        modifications, tuning and enhanced driving capability.
                     </p>

                  </div>

               </div>


               <div class="col-md-3 col-sm-6 col-xs-12">

                  <div class="services-grid">

                     <div class="icons">
                        <i class="flaticon-security"></i>
                     </div>

                     <h4>Luxury Modifications</h4>

                     <p>
                        Premium interiors, stylish finishes, exclusive
                        designs and quality accessories for a unique look.
                     </p>

                  </div>

               </div>


               <div class="col-md-3 col-sm-6 col-xs-12">

                  <div class="services-grid">

                     <div class="icons">
                        <i class="flaticon-disc-brake-1"></i>
                     </div>

                     <h4>Jeep Customization</h4>

                     <p>
                        Personalize your Jeep with modifications and designs
                        created around your individual requirements.
                     </p>

                  </div>

               </div>

            </div>

         </div>

      </section>


      <!-- ==============================
               WHY CHOOSE US
          ================================== -->
      <section class="padding-top-90 gray services-center">

         <div class="container">

            <!-- HEADING -->
            <div class="heading-panel">

               <div class="col-xs-12 col-md-12 col-sm-12 text-center">

                  <h1>
                     Why Choose
                     <span class="heading-color">
                        Rabdeep Motors
                     </span>
                  </h1>

                  <p class="heading-text">
                     Professional craftsmanship, personalized
                     customization and quality modifications for
                     your dream Jeep.
                  </p>

               </div>

            </div>


            <div class="row clearfix">


               <!-- LEFT COLUMN -->
               <div class="col-md-4 col-sm-6 col-xs-12 pull-left">

                  <div class="services-grid">

                     <div class="icons icon-right">
                        <i class="flaticon-engine-4"></i>
                     </div>

                     <h4>Expert Craftsmanship</h4>

                     <p>
                        Our skilled professionals focus on precision,
                        quality and durability in every modification.
                     </p>

                  </div>


                  <div class="services-grid">

                     <div class="icons icon-right">
                        <i class="flaticon-settings"></i>
                     </div>

                     <h4>Complete Customization</h4>

                     <p>
                        From off-road builds to luxury modifications,
                        we create vehicles according to your vision.
                     </p>

                  </div>


                  <div class="services-grid">

                     <div class="icons icon-right">
                        <i class="flaticon-car-steering-wheel"></i>
                     </div>

                     <h4>Personalized Designs</h4>

                     <p>
                        Every project can be customized according to
                        your preferred style, performance and finish.
                     </p>

                  </div>

               </div>


               <!-- CENTER IMAGE -->
               <div class="col-md-4 col-sm-12 col-xs-12">

                  <figure class="wow bounceInUp" data-wow-delay="0ms" data-wow-duration="2500ms">

                     <img class="center-block img-responsive" src="{{ asset('images/why-choose.webp') }}"
                        alt="Modified Jeep by Rabdeep Motors">

                  </figure>

               </div>


               <!-- RIGHT COLUMN -->
               <div class="col-md-4 col-sm-6 col-xs-12 pull-right">

                  <div class="services-grid">

                     <div class="icons icon-left">
                        <i class="flaticon-vehicle-3"></i>
                     </div>

                     <h4>Quality Materials</h4>

                     <p>
                        We focus on quality engines, suspension,
                        interiors and accessories for dependable builds.
                     </p>

                  </div>


                  <div class="services-grid">

                     <div class="icons icon-left">
                        <i class="flaticon-settings"></i>
                     </div>

                     <h4>Powerful Performance</h4>

                     <p>
                        Our modified Jeeps are designed for strength,
                        style and an enhanced driving experience.
                     </p>

                  </div>


                  <div class="services-grid">

                     <div class="icons icon-left">
                        <i class="flaticon-key"></i>
                     </div>

                     <h4>Trusted Service</h4>

                     <p>
                        We focus on customer satisfaction, quality work
                        and reliable modification services.
                     </p>

                  </div>

               </div>

            </div>

         </div>

      </section>


      <!-- ==============================
               MODIFIED JEEP CTA
          ================================== -->
      <section class="car-inspection section-padding">

         <div class="container">

            <div class="row">

               <!-- IMAGE -->
               <div class="col-md-6 col-sm-6 col-xs-12 nopadding">

                  <div class="call-to-action-img-section-right">

                     <img src="{{ asset('images/modified.webp') }}" class="wow slideInLeft img-responsive"
                        data-wow-delay="0ms" data-wow-duration="2000ms" alt="Custom Modified Jeep Rabdeep Motors">

                  </div>

               </div>


               <!-- CONTENT -->
               <div class="col-md-6 col-sm-12 col-xs-12 nopadding">

                  <div class="call-to-action-detail-section">

                     <div class="heading-2">

                        <h3>
                           Build Your Dream Jeep
                        </h3>

                        <h2>
                           Custom Jeep Modification
                        </h2>

                     </div>

                     <p>
                        Looking for a modified Jeep that matches your
                        personality and style? Rabdeep Motors offers
                        personalized Jeep customization with a focus
                        on design, performance and quality.
                     </p>


                     <div class="row">

                        <ul>

                           <li class="col-sm-6">
                              <i class="fa fa-check"></i>
                              Custom Exterior
                           </li>

                           <li class="col-sm-6">
                              <i class="fa fa-check"></i>
                              Premium Interior
                           </li>

                           <li class="col-sm-6">
                              <i class="fa fa-check"></i>
                              Performance Upgrades
                           </li>

                           <li class="col-sm-6">
                              <i class="fa fa-check"></i>
                              Suspension Upgrades
                           </li>

                           <li class="col-sm-6">
                              <i class="fa fa-check"></i>
                              Custom Accessories
                           </li>

                           <li class="col-sm-6">
                              <i class="fa fa-check"></i>
                              Off-Road Modifications
                           </li>

                           <li class="col-sm-6">
                              <i class="fa fa-check"></i>
                              Luxury Modifications
                           </li>

                           <li class="col-sm-6">
                              <i class="fa fa-check"></i>
                              Personalized Designs
                           </li>

                        </ul>

                     </div>


                     <a href="{{ route('contact') }}" class="btn-theme btn-lg btn">

                        Contact Us

                        <i class="fa fa-angle-right"></i>

                     </a>

                  </div>

               </div>

            </div>

         </div>

      </section>


      <!-- ==============================
               OUR LOCATION / TRUST
          ================================== -->
      <section class="custom-padding">

         <div class="container">

            <div class="row">

               <div class="col-md-12 text-center">

                  <div class="heading-panel">

                     <h1>
                        Rabdeep Motors
                        <span class="heading-color">
                           Mandi Dabwali
                        </span>
                     </h1>

                     <p class="heading-text">
                        Your destination for modified Jeeps,
                        custom-built cars and professional
                        vehicle customization.
                     </p>

                  </div>


                  <p>
                     Visit Rabdeep Motors at Sirsa Road, near Mahindra
                     Tractors, opposite Chauhan Nagar, Mandi Dabwali,
                     Haryana 125104.
                  </p>


                  <a href="{{ route('contact') }}" class="btn-theme btn-lg btn">

                     Get In Touch

                     <i class="fa fa-angle-right"></i>

                  </a>

               </div>

            </div>

         </div>

      </section>


   </div>

@endsection