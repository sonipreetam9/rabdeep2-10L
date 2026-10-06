@extends('layouts.header')
@section('title', 'Contact us')
@section('description', 'Contact page description')
@section('content')
   <!-- =-=-=-=-=-=-= Main Header End  =-=-=-=-=-=-= -->
   <!-- =-=-=-=-=-=-= Breadcrumb =-=-=-=-=-=-= -->
   <div class="page-header-area-2 gray">
      <div class="container">
         <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
               <div class="small-breadcrumb">
                  <div class=" breadcrumb-link">
                     <ul>
                        <li><a href="{{ route('index') }}">Home</a></li>
                        <li><a class="active" href="{{ route('contact') }}">Contact</a></li>
                     </ul>
                  </div>
                  <div class="header-page">
                     <h1>Fell Free To Contact Us</h1>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- =-=-=-=-=-=-= Breadcrumb End =-=-=-=-=-=-= -->
   <!-- =-=-=-=-=-=-= Main Content Area =-=-=-=-=-=-= -->
   <div class="main-content-area clearfix">
      <!-- =-=-=-=-=-=-= Latest Ads =-=-=-=-=-=-= -->

      <section class="section-padding gray no-top">

         <div class="container">

            <div class="row">

               <div class="col-md-12 col-sm-12 col-xs-12 no-padding commentForm">

                  <!-- ==========================================
                                 CONTACT FORM
                            =========================================== -->

                  <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">

                     {{-- Success Message --}}
                     @if(session('success'))
                        <div class="alert alert-success">
                           {{ session('success') }}
                        </div>
                     @endif

                     {{-- Validation Errors --}}
                     @if($errors->any())
                        <div class="alert alert-danger">
                           <ul style="margin:0; padding-left:20px;">
                              @foreach($errors->all() as $error)
                                 <li>{{ $error }}</li>
                              @endforeach
                           </ul>
                        </div>
                     @endif


                     <form method="POST" action="{{ route('contact.submit') }}" id="contact_form" name="contact_form">
                        @csrf
                        <div class="row">
                           <!-- NAME -->
                           <div class="col-lg-6 col-md-6 col-xs-12">
                              <div class="form-group">
                                 <input type="text" placeholder="Name" id="name" name="name" class="form-control"
                                    value="{{ old('name') }}" required>
                              </div>
                              <!-- EMAIL -->
                              <div class="form-group">
                                 <input type="email" placeholder="Email" id="email" name="email" class="form-control"
                                    value="{{ old('email') }}" required>
                              </div>
                              <!-- PHONE -->
                              <div class="form-group">
                                 <input type="text" placeholder="Phone No." id="phone" name="phone" class="form-control"
                                    value="{{ old('phone') }}" maxlength="20" required>
                              </div>
                           </div>
                           <!-- MESSAGE -->
                           <div class="col-lg-6 col-md-6 col-xs-12">
                              <div class="form-group">
                                 <textarea cols="12" rows="7" placeholder="Message..." id="message" name="message"
                                    class="form-control" required>{{ old('message') }}</textarea>
                              </div>
                           </div>
                           <!-- SUBMIT -->
                           <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                              <button class="btn btn-theme" type="submit">
                                 Send Message
                              </button>
                           </div>
                        </div>
                     </form>
                  </div>


                  <!-- ==========================================
                                 CONTACT INFORMATION
                            =========================================== -->

                  <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                     <div class="contactInfo">
                        <!-- ADDRESS -->
                        <div class="singleContadds">
                           <i class="fa fa-map-marker"></i>
                           <p>
                              {{ $CompanyAddress }}
                           </p>
                        </div>
                        <!-- PHONE -->
                        <div class="singleContadds phone">
                           <i class="fa fa-phone"></i>
                           <p>
                              +91 {{ $CompanyPhone1 }}
                              <span>- Office</span>
                           </p>
                           <p>
                              +91 {{ $CompanyPhone2 }}
                              <span>- Mobile</span>
                           </p>
                        </div>
                        <!-- EMAIL -->
                        <div class="singleContadds">
                           <i class="fa fa-envelope"></i>
                           <a href="mailto:{{ $CompanyEmail }}">
                              {{ $CompanyEmail }}
                           </a>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- ==========================================
                             GOOGLE MAP
                        =========================================== -->
               <div class="col-md-12 col-sm-12 col-xs-12 no-padding commentForm" style="margin-top:50px;">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                     <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d49284.42418387262!2d74.70843017489379!3d29.936477668595934!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3916d93043245fc9%3A0xc70719393bffc74f!2sRABDEEP%20MOTORS%20JEEPS!5e0!3m2!1sen!2sin!4v1739948720591!5m2!1sen!2sin"
                        width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                     </iframe>
                  </div>
               </div>
            </div>
         </div>
      </section>


      <!-- =-=-=-=-=-=-= Ads Archives End =-=-=-=-=-=-= -->
@endsection