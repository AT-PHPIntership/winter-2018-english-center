@extends('frontend.layouts.master')
@section('content')
<!--Breadcrumb Banner Area Start-->
<div class="breadcrumb-banner-area">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="breadcrumb-text">
          <h1 class="text-center">{{ __('layout_user.courses.courses_detail.title') }}</h1>
          <div class="breadcrumb-bar">
            <ul class="breadcrumb text-center">
              <li><a href="index.html">{{ __('layout_user.header.home') }}</a></li>
              <li>{{ __('layout_user.courses.courses_detail.title') }}</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--End of Breadcrumb Banner Area-->
<!--Courses Details Area Start-->
<div class="course-area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title-wrapper">
                    <div class="section-title">
                        <h3>{{ $course->name }}</h3>
                        <p>{{ $course->children->count() }} @lang('layout_user.courses.name')</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($course->children as $childrenCourse)
            <div class="col-md-4 col-sm-6 margin-bottom">
                <div class="single-item">
                    <div class="single-item-image overlay-effect">
                        <a href="{{ route('user.course.detail', $childrenCourse->id) }}"><img src="{{ $childrenCourse->image }}" alt=""></a>
                    </div>
                    <div class="single-item-text">
                        <h4><a href="{{ route('user.course.detail', $childrenCourse->id) }}">{{ $childrenCourse->name }}</a></h4>
                        <div class="single-item-text-info">
                            <span>@lang('layout_user.levels.date') <span>{{ $childrenCourse->updated_at }}</span></span>
                        </div>
                        <p>{{ $childrenCourse->content }}</p>
                        <div class="single-item-content">
                            <div class="single-item-comment-view">
                                <span><i class="zmdi zmdi-eye"></i>{{ $childrenCourse->count_view }}</span>
                                <span><i class="zmdi zmdi-comments"></i></span>
                            </div>
                            <div class="single-item-rating">
                                <i class="zmdi {{ ($childrenCourse->average -0.5)>0 ? 'zmdi-star': (($childrenCourse->average -0.5)<0 ? 'zmdi-star-outline' : 'zmdi-star-half') }}"></i>
                                <i class="zmdi {{ ($childrenCourse->average -1.5)>0 ? 'zmdi-star': (($childrenCourse->average -1.5)<0 ? 'zmdi-star-outline' : 'zmdi-star-half') }}"></i>
                                <i class="zmdi {{ ($childrenCourse->average -2.5)>0 ? 'zmdi-star': (($childrenCourse->average -2.5)<0 ? 'zmdi-star-outline' : 'zmdi-star-half') }}"></i>
                                <i class="zmdi {{ ($childrenCourse->average -3.5)>0 ? 'zmdi-star': (($childrenCourse->average -3.5)<0 ? 'zmdi-star-outline' : 'zmdi-star-half') }}"></i>
                                <i class="zmdi {{ ($childrenCourse->average -4.5)>0 ? 'zmdi-star': (($childrenCourse->average -4.5)<0 ? 'zmdi-star-outline' : 'zmdi-star-half') }}"></i>
                            </div>
                        </div>   
                    </div>
                    <div class="button-bottom">
                        <a href="{{ route('user.course.detail', $childrenCourse->id) }}" class="button-default">@lang('layout_user.levels.btn')</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>>
<!--Courses Details Area End-->
@endsection
