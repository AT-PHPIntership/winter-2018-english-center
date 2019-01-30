@extends('frontend.layouts.master')
@section('content')
<!--Breadcrumb Banner Area Start-->
<div class="breadcrumb-banner-area">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="breadcrumb-text">
          <h1 class="text-center">{{ __('layout_user.show_courses.our_courses') }}</h1>
          <div class="breadcrumb-bar">
            <ul class="breadcrumb text-center">
              <li><a href="index.html">{{ __('layout_user.header.home') }}</a></li>
              <li>{{ __('layout_user.header.courses') }}</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--End of Breadcrumb Banner Area-->
<!--Event Area Start-->
<div class="event-area section-padding event-page">
  <div class="container">
    <div class="row">
      <div class="col-md-4 col-sm-6">
        <div class="single-event-item">
          <div class="single-event-image">
            <a href="#">
            <img src="" alt="">
            <span><span></span>{{ __('layout_user.header.courses') }}</span>
            </a>
          </div>
          <div class="single-event-text">
            <h3><a href="#"></a></h3>
            <div class="single-item-comment-view">
              <span><i class="zmdi zmdi-eye"></i></span>
              <div class="single-item-rating pull-right">
                  <i class="zmdi zmdi-star"></i>
                  <i class="zmdi zmdi-star"></i>
                  <i class="zmdi zmdi-star"></i>
                  <i class="zmdi zmdi-star"></i>
                  <i class="zmdi zmdi-star-half"></i>
               </div>
            </div>
            <p></p>
            <a class="button-default" href="#">LEARN Now</a>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="pagination-content">
          <ul class="pagination">
            <li><a href="#"><i class="zmdi zmdi-chevron-left"></i></a></li>
            <li class="current"><a href="#"><i class="zmdi zmdi-chevron-right"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
<!--End of Event Area-->
@endsection
