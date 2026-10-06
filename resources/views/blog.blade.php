@extends('layouts.header')
@section('content')

   <!-- =-=-=-=-=-=-= Breadcrumb =-=-=-=-=-=-= -->
   <div class="page-header-area-2 gray">
      <div class="container">
         <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
               <div class="small-breadcrumb">
                  <div class=" breadcrumb-link">
                     <ul>
                        <li><a href="{{ route('index') }}">Home Page</a></li>
                        <li><a class="active" href="{{ route('blog') }}">Blog</a></li>
                     </ul>
                  </div>
                  <div class="header-page">
                     <h1>Latest News & Trends</h1>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>

   <!-- =-=-=-=-=-=-= Main Content Area =-=-=-=-=-=-= -->
   <div class="main-content-area clearfix">
      <section class="custom-padding">
         <div class="container">
            <div class="row">
               <div class="heading-panel">
                  <div class="col-xs-12 col-md-12 col-sm-12 text-center">
                     <h1>Latest <span class="heading-color"> Blog</span> Post</h1>
                  </div>
               </div>
               <!-- Middle Content Box -->
               <div class="col-md-12 col-xs-12 col-sm-12">
                  <div class="row">
                     <div class="posts-masonry">

                        @foreach($blogs as $blog)
                           <div class="col-md-4 col-sm-6 col-xs-12">
                              <div class="blog-post">
                                 <div class="post-img">
                                    <a href="{{ route('blog.detail', ['slug' => $blog->slug]) }}">
                                       <img class="img-responsive" alt="{{ $blog->title ?? 'Blog Image' }}"
                                          src="{{ asset('admin-manage/Uploads/' . basename($blog->image)) }}">
                                    </a>
                                 </div>
                                 <div class="post-info"> <a href="{{ route('blog.detail', ['slug' => $blog->slug]) }}">{{ $blog->created_at->format('M d, Y') }}</a> </div>
                                 <h3 class="post-title"> <a href="{{ route('blog.detail', ['slug' => $blog->slug]) }}"> {{ $blog->title }} </a> </h3>
                                 <p class="post-excerpt"> {{ $blog->short_description }} <a href="{{ route('blog.detail', ['slug' => $blog->slug]) }}"><strong>Read
                                          More</strong></a>
                                 </p>
                              </div>
                           </div>
                        @endforeach
                     </div>
                     <div class="clearfix"></div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- =-=-=-=-=-=-= FOOTER =-=-=-=-=-=-= -->
@endsection