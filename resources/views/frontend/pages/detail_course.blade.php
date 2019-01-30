@extends('frontend.layouts.master')
@section('content')
<!--Breadcrumb Banner Area Start-->
<div class="breadcrumb-banner-area">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="breadcrumb-text">
          <h1 class="text-center">{{ __('layout_user.courses.course_detail.course_detail') }}</h1>
          <div class="breadcrumb-bar">
            <ul class="breadcrumb text-center">
              <li><a href="index.html">{{ __('layout_user.header.home') }}</a></li>
              <li>{{ __('layout_user.courses.course_detail.course_detail') }}</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--End of Breadcrumb Banner Area-->
<!--Course Details Area Start-->
<div class="course-details-area section-padding">
  <div class="container">
    <div class="row">
      <div class="col-md-9">
        <div class="course-details-content">
          <div class="single-course-details">
            <div class="row">
              <div class="col-md-6">
                <div class="overlay-effect">
                  <a href=""><img alt="" src="{{ $course->image}}"></a>
                </div>
              </div>
              <div class="col-md-6">
                <div class="single-item-text">
                  <h4>{{ $course->title }}</h4>
                  <div class="single-item-text-info">
                    <span>{{ __('layout_user.courses.course_detail.date_time') }}<span>{{ $course->created_at}}</span></span>
                  </div>
                  <div class="course-text-content">
                    <p>{{ $course->content }}</p>
                  </div>
                  <div class="single-item-content">
                    <div class="single-item-comment-view">
                      <span><i class="zmdi zmdi-eye"></i>{{ $course->count_view }}</span>
                    </div>
                    <div class="single-item-rating">
                      <i class="zmdi zmdi-star"></i>
                      <i class="zmdi zmdi-star"></i>
                      <i class="zmdi zmdi-star"></i>
                      <i class="zmdi zmdi-star"></i>
                      <i class="zmdi zmdi-star-half"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="course-duration">
            <div class="duration-title">
              <div class="text"><span>{{ __('layout_user.courses.course_detail.lessons') }}</span> <span class="text-right">{{ __('layout_user.courses.course_detail.open_time') }}</span></div>
            </div>
            <div class="duration-text">
                @foreach ($lessons as $lesson)
                @if($lesson->course_id === $course->id)
                  <div class="text">
                    <a href="#">{{ $lesson->name }}</a>
                    <span class="text-right">{{ $lesson->created_at }}</span></div>
                @endif
                @endforeach
            </div>
          </div>
          <div class="comments">
            <h4 class="title">{{ __('layout_user.courses.course_detail.cmt') }}</h4>
            <div class="single-comment">
              <div class="author-image">
                <img src="img/comment/1.jpg" alt="">
              </div>
              <div class="comment-text">
                <div class="author-info">
                  <h4><a href="#">MD Tokdir Ali</a></h4>
                  <span class="comment-time">Posted on Jun 12, 2015</span>
                </div>
                <p></p>
              </div>
            </div>
            <div class="single-comment">
              <div class="author-image">
                <img src="img/comment/3.jpg" alt="">
              </div>
              <div class="comment-text">
                <div class="author-info">
                  <h4><a href="#">MR Soytan Ali</a></h4>
                  <span class="comment-time">Posted on Jun 12, 2015</span>
                </div>
                <p></p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="sidebar-widget">
          <div class="single-sidebar-widget">
            <h4 class="title">{{ __('layout_user.courses.course_detail.related_courses') }}</h4>
            <div class="single-item">
              <div class="single-item-image overlay-effect">
                <a href="#"><img alt="" src="img/course/1.jpg"></a>
              </div>
              <div class="single-item-text">
                <h4><a href="#">Photoshop CC 2017</a></h4>
                <div class="single-item-text-info">
                  <span>By: <span>M S Nawaz</span></span>
                  <span>Date: <span>20.5.15</span></span>
                </div>
                <p></p>
                <div class="single-item-content">
                  <div class="single-item-comment-view">
                    <span><i class="zmdi zmdi-eye"></i>59</span>
                    <span><i class="zmdi zmdi-comments"></i>19</span>
                  </div>
                  <div class="single-item-rating">
                    <i class="zmdi zmdi-star"></i>
                    <i class="zmdi zmdi-star"></i>
                    <i class="zmdi zmdi-star"></i>
                    <i class="zmdi zmdi-star"></i>
                    <i class="zmdi zmdi-star-half"></i>
                  </div>
                </div>
              </div>
              <div class="button-bottom">
                <a class="button-default" href="#">{{ __('layout_user.courses.btn') }}</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--End of Course Details Area-->
@endsection
