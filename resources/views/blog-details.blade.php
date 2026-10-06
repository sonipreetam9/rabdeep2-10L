@extends('layouts.header')
@section('title', 'Blog Details')
@section('description', 'Blog details description')
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
                        <li><a class="active" href="{{ route('blog.detail', ['slug' => $blog->slug]) }}">{{ $blog->title }}</a></li>
                     </ul>
                  </div>
                  <div class="header-page">
                     <h1>{{ $blog->title }}</h1>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- =-=-=-=-=-=-= Breadcrumb End =-=-=-=-=-=-= -->
   <div class="main-content-area clearfix">
      <section class="section-padding no-top gray">
         <div class="container">
            <div class="row">
               <div class="col-md-8 col-xs-12 col-sm-12">
                  <div class="blog-detial">
                     <div class="blog-post">
                        <div class="post-img">
                           <a href="{{ asset('admin-manage/Uploads/' . basename($blog->image)) }}" data-fancybox="group"> <img class="img-responsive large-img" alt=""
                                 src="{{ asset('admin-manage/Uploads/' . basename($blog->image)) }}"> </a>
                        </div>
                        <div class="post-info"> <a href="#">{{ $blog->created_at->format('M d, Y') }}</a> </div>
                        <div class="post-excerpt">
                           {!! $blog->long_description !!}
                           <div class="clearfix"></div>
                           <!-- <div class="tags-share clearfix">   
                              <div class="tags pull-left">
                                 <h3>Tags:</h3>
                                 <ul>
                                    <li><a href="#">Design, </a></li>
                                    <li><a href="#">Kitchen, </a></li>
                                    <li><a href="#">House, </a></li>
                                    <li><a href="#">Building</a></li>
                                 </ul>
                              </div>
                              <div class="share pull-right">
                                 <h3>Share:</h3>
                                 <ul>
                                    <li><a href="#">Facebook, </a></li>
                                    <li><a href="#">Google+, </a></li>
                                    <li><a href="#">Instagram</a></li>
                                 </ul>
                              </div>
                           </div> -->
                           <div class="clearfix"></div>
               
                           <!-- <div class="blog-section">
                              <div class="blog-heading">
                                 <h2>leave your comment </h2>
                                 <hr>
                              </div>
                              <div class="commentform">
                                 <form>
                                    <div class="row">
                                       <div class="col-md-6 col-sm-12">
                                          <div class="form-group">
                                             <label>Name <span class="required">*</span>
                                             </label>
                                             <input type="text" class="form-control" placeholder="">
                                          </div>
                                       </div>
                                       <div class="col-md-6 col-sm-12">
                                          <div class="form-group">
                                             <label>Email <span class="required">*</span>
                                             </label>
                                             <input type="email" class="form-control" placeholder="">
                                          </div>
                                       </div>
                                       <div class="col-md-12 col-sm-12">
                                          <div class="form-group">
                                             <label>Comment <span class="required">*</span>
                                             </label>
                                             <textarea class="form-control" placeholder="" rows="8" cols="6"></textarea>
                                          </div>
                                       </div>
                                       <div class="col-md-12 col-sm-12 margin-top-20 clearfix">
                                          <button type="submit" class="btn btn-theme">Post Your Comment</button>
                                       </div>
                                    </div>
                                 </form>
                              </div>
                           </div> -->
                        </div>
                     </div>
                     <!-- Blog Grid -->
                  </div>
               </div>
               <!-- Right Sidebar -->
               <div class="col-md-4 col-xs-12 col-sm-12">
                  <!-- Sidebar Widgets -->
                  <div class="blog-sidebar">
                     <!-- Latest News -->
                     <div class="widget">
                        <div class="widget-heading">
                           <h4 class="panel-title"><a>Latest Blogs</a></h4>
                        </div>
                        <div class="widget-content recent-ads">
                           <!-- Ads -->
                           @foreach ($blogs as $blogss)
                           <div class="recent-ads-list">
                              <div class="recent-ads-container">
                                 <div class="recent-ads-list-image">
                                    <a href="#" class="recent-ads-list-image-inner">
                                       <img src="{{ asset('admin-manage/Uploads/' . $blogss->image) }}" alt="">
                                    </a>
                                 </div>
                                 <div class="recent-ads-list-content">
                                    <h3 class="recent-ads-list-title">
                                       <a href="{{ route('blog.detail', $blogss->slug) }}">{{ $blogss->title }}</a>
                                    </h3>
                                    <ul class="recent-ads-list-location">
                                       <li><a href="{{ route('blog.detail', $blogss->slug) }}">{{ $blogss->created_at->format('M d, Y') }}</a></li>
                                    </ul>
                                 </div>
                              </div>
                           </div>
                           @endforeach
              
                        </div>
                     </div>

                  </div>
                  <!-- Sidebar Widgets End -->
               </div>
               <!-- Middle Content Area  End -->
            </div>
            <!-- Row End -->
         </div>
         <!-- Main Container End -->
      </section>
      <!-- =-=-=-=-=-=-= FOOTER =-=-=-=-=-=-= -->
@endsection