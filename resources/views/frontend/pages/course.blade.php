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
    <div class="row">
      @foreach ($courses as $course)
      <div class="col-md-4 col-sm-6">
        <div class="single-event-item">
          <div class="single-event-image">
            <a href="#">
            <img src="{{ $course->image }}" alt="">
            <span><span>{{$course->children->count()}}</span>{{ __('layout_user.header.courses') }}</span>
            </a>
          </div>
          <div class="single-event-text">
            <h3><a href="#">{{ $course->title }}</a></h3>
            <p>{{ $course->content }}</p>
            <a class="button-default" href="#">{{ __('layout_user.courses.btn') }}</a>
          </div>
        </div>
      </div>
      @endforeach
    </div>
    <div class="row">
      <!--Course Area Start-->
      @foreach ($courses as $course)
      <div class="course-area section-padding bg-white">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="section-title-wrapper">
                <div class="section-title">
                  <h3>{{ $course->name }}</h3>
                  <span>{{ $course->children->count() }}</span>
                  <p>{{ __('layout_user.header.courses') }}</p>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            @foreach($course->children as $childrenCourse)
            <div class="col-md-4 col-sm-6">
                <div class="single-event-item">
                  <div class="single-event-image">
                    <a href="{{ route('user.course.detail', $childrenCourse->id) }}">
                    <img src="{{ $childrenCourse->image }}" alt="">
                    </a>
                  </div>
                  <div class="single-event-text">
                    <h3><a href="{{ route('user.course.detail', $childrenCourse->id) }}">{{ $childrenCourse->title }}</a></h3>
                    <div class="single-item-content">
                       <div class="single-item-comment-view">
                           <span><i class="zmdi zmdi-eye"></i>{{ $childrenCourse->count_view }}</span>
                       </div>
                       <div class="single-item-rating">
                        <input id="input-1" name="input-1" class="rating rating-loading" data-min="0" data-max="5" data-step="0.1" value="{{ $childrenCourse->average }}" data-size="ys" disabled="">
                       </div>
                    </div>
                    <p>{{ $childrenCourse->content }}</p>
                    <a class="button-default" href="#">{{ __('layout_user.courses.btn') }}</a>
                  </div>
                </div>
              </div>
            @endforeach
            <a href="#" class="course-item-detail-view-all pull-right">@lang('layout_user.courses.see_all') 
            <i class="fa fa-chevron-right" aria-hidden="true"></i>
            </a>
          </div>
        </div>
      </div>
      @endforeach
      <!--End of Course Area-->
    </div>
  </div>
</div>
<!--End of Event Area-->
@endsection
