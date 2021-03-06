@extends('frontend.layouts.master')
@section('content')
    @include('frontend.layouts.partials.slider')
    <!--About Area Start-->
    <div class="about-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="about-container">
                        <h3>@lang('layout_user.why_us.title')</h3>
                        <p>{{ $system->whyus }}</p>
                        <a class="button-default" href="#">@lang('layout_user.why_us.btn')</a>	      
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End of About Area-->
    <!--Course Area Start-->
        <div class="course-area section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title-wrapper">
                            <div class="section-title">
                                <h3>@lang('layout_user.courses.new.title')</h3>
                                <p>@lang('layout_user.courses.new.intro')</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach ($newCourses as $course)
                    <div class="col-md-4 col-sm-6">
                        <div class="single-item">
                            <div class="single-item-image overlay-effect">
                                <a href="#"><img src="{{ $course->image }}" alt=""></a>
                            </div>
                            <div class="single-item-text">
                                <h4><a href="#">{{ $course->title }}</a></h4>
                                <div class="single-item-text-info">
                                    <span>@lang('layout_user.courses.date') <span>{{ $course->updated_at }}</span></span>
                                </div>
                                <p>{{ $course->content }}</p>
                                <div class="single-item-content">
                                   <div class="single-item-comment-view">
                                       <span><i class="zmdi zmdi-eye"></i>{{ $course->count_view }}</span>
                                       <span><i class="zmdi zmdi-comments"></i></span>
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
                                <a href="#" class="button-default">@lang('layout_user.courses.btn')</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <div class="col-md-12 col-sm-12 text-center">
                        <a href="#" class="button-default button-large">@lang('layout_user.courses.allcourses')<i class="zmdi zmdi-chevron-right"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="course-area section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title-wrapper">
                            <div class="section-title">
                                <h3>@lang('layout_user.courses.popular.title')</h3>
                                <p>@lang('layout_user.courses.popular.intro')</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach ($popularCourses as $course)
                    <div class="col-md-4 col-sm-6">
                        <div class="single-item">
                            <div class="single-item-image overlay-effect">
                                <a href="#"><img src="{{ $course->image }}" alt=""></a>
                            </div>
                            <div class="single-item-text">
                                <h4><a href="#">{{ $course->title }}</a></h4>
                                <div class="single-item-text-info">
                                    <span>@lang('layout_user.courses.date') <span>{{ $course->updated_at }}</span></span>
                                </div>
                                <p>{{ $course->content }}</p>
                                <div class="single-item-content">
                                   <div class="single-item-comment-view">
                                       <span><i class="zmdi zmdi-eye"></i>{{ $course->count_view }}</span>
                                       <span><i class="zmdi zmdi-comments"></i></span>
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
                                <a href="#" class="button-default">@lang('layout_user.courses.btn')</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <div class="col-md-12 col-sm-12 text-center">
                        <a href="#" class="button-default button-large">@lang('layout_user.courses.allcourses')<i class="zmdi zmdi-chevron-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    <!--End of Course Area-->
@endsection
