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
                  <h4>{{ $course->name }}</h4>
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
                      <i class="zmdi {{ ($course->average -0.5)>0 ? 'zmdi-star': (($course->average -0.5)<0 ? 'zmdi-star-outline' : 'zmdi-star-half') }}"></i>
                      <i class="zmdi {{ ($course->average -1.5)>0 ? 'zmdi-star': (($course->average -1.5)<0 ? 'zmdi-star-outline' : 'zmdi-star-half') }}"></i>
                      <i class="zmdi {{ ($course->average -2.5)>0 ? 'zmdi-star': (($course->average -2.5)<0 ? 'zmdi-star-outline' : 'zmdi-star-half') }}"></i>
                      <i class="zmdi {{ ($course->average -3.5)>0 ? 'zmdi-star': (($course->average -3.5)<0 ? 'zmdi-star-outline' : 'zmdi-star-half') }}"></i>
                      <i class="zmdi {{ ($course->average -4.5)>0 ? 'zmdi-star': (($course->average -4.5)<0 ? 'zmdi-star-outline' : 'zmdi-star-half') }}"></i>
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
                <a href="{{ route('user.lesson.detail', $lesson->id) }}">{{ $lesson->name }}</a>
                <span class="text-right">{{ $lesson->created_at }}</span>
              </div>
              @endif
              @endforeach
            </div>
          </div>
          @if(Auth::check())
          @foreach((Auth::user()->courses) as $course_user)
            @if($course_user->id === $course->id)
            <div class="rating-link">
              <div class="single-item-rating user-rating">
                <i class="zmdi zmdi-star"></i>
                <i class="zmdi zmdi-star"></i>
                <i class="zmdi zmdi-star"></i>
                <i class="zmdi zmdi-star"></i>
                <i class="zmdi zmdi-star"></i>
              </div>
              <a class="rating" href="{{ route('user.rating', ['courses', $course->id] )}}">@lang('layout_user.courses.course_detail.rating.title')</a>
            </div>
            @else
            <div class="rating-link">
            </div>
            @endif
          @endforeach
          @endif
          <div class="comments">
            <h4 class="title">{{ __('layout_user.courses.course_detail.cmt') }}</h4>
            <div class="single-comment">
                <div class="comment-text">
                    <textarea class="form-control" id='comment-text' name="review" placeholder="{{ __('layout_user.lessons.lesson_detail.comment.enter_comment') }}"></textarea>
                </div>
                <div class="col-lg-2 pull-right">
                    <input class="btn btn-block" id='comment-button' {{(Auth::user()) ? 'data-user=' .Auth::user()->id : ''}} data-element='{{ $course->id }}' data-token="{{ csrf_token() }}" value="{{ __('layout_user.lessons.lesson_detail.comment.btn-comment') }}" type="submit">
                </div>
            </div>
            @foreach ($course->comments as $comment)
            <div class="single-comment" data-id="{{ $comment->id }}">
                  <div class="author-image">
                    <img src="{{ $comment->user->userProfile['url'] }}" alt="">
                  </div>
              <div class="comment-text">
                <div class="author-info">
                  <h4><a href="#">{{ $comment->user->userProfile['name'] }}</a></h4>
                  <span class="reply"><a class="add-reply" id="{{ $comment->id }}">{{ __('layout_user.lessons.lesson_detail.comment.reply') }}</a></span>
                  <span class="comment-time"><span>{{ __('layout_user.courses.course_detail.comment.posted_on') }}</span>{{ $comment->created_at }} /</span>
                </div>
                <p>{{ $comment->content }}</p>
              </div>
            </div>
            @foreach ($comment->children as $reply)
            <div class="single-comment comment-reply" data-id="{{ $reply->id }}">
              <div class="author-image">
                <img src="{{ $reply->user->userProfile['url'] }}" alt="">
              </div>
              <div class="comment-text">
                <div class="author-info">
                  <h4><a href="#">{{ $reply->user->userProfile['name'] }}</a></h4>
                  <span class="comment-time"></span>
                </div>
                <p>{{ $reply->content }}</p>
              </div>
            </div>
            @endforeach
            @endforeach

            @foreach($rates as $rate)
              @if($rate->ratingable_type === 'courses')
                @if($rate->ratingable_id === $course->id)
                  <div class="single-comment" data-id="{{ $rate->id }}">
                        <div class="author-image">
                          <img src="storage/avatar/{{ $rate->user->userProfile['url'] }}" alt="">
                        </div>
                    <div class="comment-text">
                      <div class="author-info">
                        <h4><a href="#">{{ $rate->user->userProfile['name'] }}</a></h4>
                        <span class="comment-time"><span>{{ __('layout_user.lessons.lesson_detail.rating.time') }}</span>{{ $rate->created_at }}</span>
                      </div>
                      <div class="single-item-rating" style="float: none;">
                          <i class="zmdi {{ ($rate->star -0.5)>0 ? 'zmdi-star': (($rate->star -0.5)<0 ? 'zmdi-star-outline' : 'zmdi-star-half') }}"></i>
                          <i class="zmdi {{ ($rate->star -1.5)>0 ? 'zmdi-star': (($rate->star -1.5)<0 ? 'zmdi-star-outline' : 'zmdi-star-half') }}"></i>
                          <i class="zmdi {{ ($rate->star -2.5)>0 ? 'zmdi-star': (($rate->star -2.5)<0 ? 'zmdi-star-outline' : 'zmdi-star-half') }}"></i>
                          <i class="zmdi {{ ($rate->star -3.5)>0 ? 'zmdi-star': (($rate->star -3.5)<0 ? 'zmdi-star-outline' : 'zmdi-star-half') }}"></i>
                          <i class="zmdi {{ ($rate->star -4.5)>0 ? 'zmdi-star': (($rate->star -4.5)<0 ? 'zmdi-star-outline' : 'zmdi-star-half') }}"></i>
                      </div>
                      <p>{{ $rate->content }}</p>
                    </div>
                  </div>
                  @endif
                @endif
            @endforeach

          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="sidebar-widget">
          <div class="single-sidebar-widget">
            <h4 class="title">{{ __('layout_user.courses.course_detail.related_courses') }}</h4>
            @foreach ($course->parent->children as $parentCourse)
            @if ($parentCourse->id != $course->id)
            <div class="single-item">
              <div class="single-item-image overlay-effect">
                <a href="{{ route('user.course.detail', $parentCourse->id) }}"><img alt="" src="{{ $parentCourse->image }}"></a>
              </div>
              <div class="single-item-text">
                <h4><a href="{{ route('user.course.detail', $parentCourse->id) }}">{{ $parentCourse->name }}</a></h4>
                <div class="single-item-text-info">
                  <span>{{ __('layout_user.courses.course_detail.date_time') }}<span>{{ $parentCourse->created_at}}</span></span>
                </div>
                <p>{{ $parentCourse->content }}</p>
                <div class="single-item-content">
                  <div class="single-item-comment-view">
                    <span><i class="zmdi zmdi-eye"></i>{{ $parentCourse->count_view }}</span>
                  </div>
                  <div class="single-item-rating">
                      <i class="zmdi {{ ($parentCourse->average -0.5)>0 ? 'zmdi-star': (($parentCourse->average -0.5)<0 ? 'zmdi-star-outline' : 'zmdi-star-half') }}"></i>
                      <i class="zmdi {{ ($parentCourse->average -1.5)>0 ? 'zmdi-star': (($parentCourse->average -1.5)<0 ? 'zmdi-star-outline' : 'zmdi-star-half') }}"></i>
                      <i class="zmdi {{ ($parentCourse->average -2.5)>0 ? 'zmdi-star': (($parentCourse->average -2.5)<0 ? 'zmdi-star-outline' : 'zmdi-star-half') }}"></i>
                      <i class="zmdi {{ ($parentCourse->average -3.5)>0 ? 'zmdi-star': (($parentCourse->average -3.5)<0 ? 'zmdi-star-outline' : 'zmdi-star-half') }}"></i>
                      <i class="zmdi {{ ($parentCourse->average -4.5)>0 ? 'zmdi-star': (($parentCourse->average -4.5)<0 ? 'zmdi-star-outline' : 'zmdi-star-half') }}"></i>
                    </div>
                </div>
              </div>
              <div class="button-bottom">
                <a class="button-default" href="{{ route('user.course.detail', $parentCourse->id) }}">{{ __('layout_user.courses.btn') }}</a>
              </div>
            </div>
            @endif
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--End of Course Details Area-->
@endsection
