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
                        <p>{!! $system->whyus !!}</p>
                        <a class="button-default" href="{{ route('user.courses') }}">@lang('layout_user.why_us.btn')</a>          
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
                                <a href="{{ route('user.course.detail', $course->id) }}"><img src="front_end/img/event/{{ $course->image }}" alt=""></a>
                            </div>
                            <div class="single-item-text">
                                <h4><a href="{{ route('user.course.detail', $course->id) }}">{{ $course->name }}</a></h4>
                                <div class="single-item-text-info">
                                    <span>@lang('layout_user.courses.date') <span>{{ $course->updated_at }}</span></span>
                                </div>
                                <p>{{ str_limit($course->content, 123) }}</p>
                                <div class="single-item-content">
                                   <div class="single-item-comment-view">
                                       <span><i class="zmdi zmdi-eye"></i>{{ $course->count_view }}</span>
                                       <span><i class="zmdi zmdi-comments"></i></span>
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
                            <div class="button-bottom">
                                <a href="{{ route('user.course.detail', $course->id) }}" class="button-default">@lang('layout_user.courses.btn')</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <div class="col-md-12 col-sm-12 text-center">
                        <a href="{{ route('user.courses') }}" class="button-default button-large">@lang('layout_user.courses.allcourses')<i class="zmdi zmdi-chevron-right"></i></a>
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
                                <a href="{{ route('user.course.detail', $course->id) }}"><img src="front_end/img/event/{{ $course->image }}" alt=""></a>
                            </div>
                            <div class="single-item-text">
                                <h4><a href="{{ route('user.course.detail', $course->id) }}">{{ $course->name }}</a></h4>
                                <div class="single-item-text-info">
                                    <span>@lang('layout_user.courses.date') <span>{{ $course->updated_at }}</span></span>
                                </div>
                                <p>{!! str_limit($course->content, 123) !!}</p>
                                <div class="single-item-content">
                                   <div class="single-item-comment-view">
                                       <span><i class="zmdi zmdi-eye"></i>{{ $course->count_view }}</span>
                                       <span><i class="zmdi zmdi-comments"></i></span>
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
                            <div class="button-bottom">
                                <a href="{{ route('user.course.detail', $course->id) }}" class="button-default">@lang('layout_user.courses.btn')</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <div class="col-md-12 col-sm-12 text-center">
                        <a href="{{ route('user.courses') }}" class="button-default button-large">@lang('layout_user.courses.allcourses')<i class="zmdi zmdi-chevron-right"></i></a>
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
                                <h3>@lang('layout_user.courses.highestRating.title')</h3>
                                <p>@lang('layout_user.courses.highestRating.intro')</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach ($highestRatingCourses as $course)
                    <div class="col-md-4 col-sm-6">
                        <div class="single-item">
                            <div class="single-item-image overlay-effect">
                                <a href="{{ route('user.course.detail', $course->id) }}"><img src="front_end/img/event/{{ $course->image }}" alt=""></a>
                            </div>
                            <div class="single-item-text">
                                <h4><a href="{{ route('user.course.detail', $course->id) }}">{{ $course->name }}</a></h4>
                                <div class="single-item-text-info">
                                    <span>@lang('layout_user.courses.date') <span>{{ $course->updated_at }}</span></span>
                                </div>
                                <p>{!! str_limit($course->content, 123) !!}</p>
                                <div class="single-item-content">
                                   <div class="single-item-comment-view">
                                       <span><i class="zmdi zmdi-eye"></i>{{ $course->count_view }}</span>
                                       <span><i class="zmdi zmdi-comments"></i></span>
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
                            <div class="button-bottom">
                                <a href="{{ route('user.course.detail', $course->id) }}" class="button-default">@lang('layout_user.courses.btn')</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <div class="col-md-12 col-sm-12 text-center">
                        <a href="{{ route('user.courses') }}" class="button-default button-large">@lang('layout_user.courses.allcourses')<i class="zmdi zmdi-chevron-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    <!--End of Course Area-->
@endsection
