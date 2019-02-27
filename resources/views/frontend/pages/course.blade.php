@extends('frontend.layouts.master')
@section('content')
<!--Breadcrumb Banner Area Start-->
<div class="breadcrumb-banner-area">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="breadcrumb-text">
          <h1 class="text-center">{{ __('layout_user.courses.show_courses.our_courses') }}</h1>
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
    <!--Testimonial Area Start-->
    <div class="">
      <div class="container">
        @foreach ($courses as $course)
        <div class="col-md-12">
          <div class="section-title-wrapper">
            <div class="section-title">
              <h3>{{ $course->name }}</h3>
              <span>{{ $course->children->count() }}</span>
              <p>{{ __('layout_user.header.courses') }}</p>
            </div>
          </div>
        </div>
        {{-- 
        <div class="row">
          --}}
          <div class="col-lg-12 col-lg-offset-0 col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1">
            <div class="row">
              <div class="col-lg-12">
                <div class="testimonial-image-slider text-center">
                  @foreach($course->children as $childrenCourse)
                  <div class="col-md-4 col-sm-6">
                    <div class="single-event-item">
                      <div class="single-event-image">
                        <a href="#">
                        <a href="{{ route('user.course.detail', $childrenCourse->id) }}">
                        <img src="{{ $childrenCourse->image }}" alt="">
                        </a>
                      </div>
                      <div class="single-event-text">
                        <h3>
                        <a href="{{ route('user.course.detail', $childrenCourse->id) }}">{{ $childrenCourse->name }}</a>
                        <div class="single-item-content">
                          <div class="single-item-comment-view pull-left">
                            <span><i class="zmdi zmdi-eye"></i>{{ $childrenCourse->count_view }}</span>
                          </div>
                          <div class="single-item-rating">
                            <i class="zmdi {{ ($course->average -0.5)>0 ? 'zmdi-star': (($course->average -0.5)<0 ? 'zmdi-star-outline' : 'zmdi-star-half') }}"></i>
                            <i class="zmdi {{ ($course->average -1.5)>0 ? 'zmdi-star': (($course->average -1.5)<0 ? 'zmdi-star-outline' : 'zmdi-star-half') }}"></i>
                            <i class="zmdi {{ ($course->average -2.5)>0 ? 'zmdi-star': (($course->average -2.5)<0 ? 'zmdi-star-outline' : 'zmdi-star-half') }}"></i>
                            <i class="zmdi {{ ($course->average -3.5)>0 ? 'zmdi-star': (($course->average -3.5)<0 ? 'zmdi-star-outline' : 'zmdi-star-half') }}"></i>
                            <i class="zmdi {{ ($course->average -4.5)>0 ? 'zmdi-star': (($course->average -4.5)<0 ? 'zmdi-star-outline' : 'zmdi-star-half') }}"></i>
                          </div>
                        </div>
                        <p>{{ $childrenCourse->content }}</p>
                        <a class="button-default" href="{{ route('user.course.detail', $childrenCourse->id) }}">{{ __('layout_user.courses.btn') }}</a>
                      </div>
                    </div>
                  </div>
                  @endforeach
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
    <!--End of Testimonial Area-->
  </div>
</div>
<!--End of Event Area-->
@endsection
