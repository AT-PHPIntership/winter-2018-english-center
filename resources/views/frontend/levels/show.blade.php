@extends('frontend.layouts.master')
@section('content')
    <!--Breadcrumb Banner Area Start-->
    <div class="breadcrumb-banner-area">
    <div class="container">
        <div class="row">
        <div class="col-md-12">
            <div class="breadcrumb-text">
            <h1 class="text-center">{{ __('layout_user.levels.name') }}</h1>
            <div class="breadcrumb-bar">
                <ul class="breadcrumb text-center">
                <li><a href="index.html">{{ __('layout_user.header.home') }}</a></li>
                <li>{{ __('layout_user.levels.title') }}</li>
                </ul>
            </div>
            </div>
        </div>
        </div>
    </div>
    </div>
    <!--End of Breadcrumb Banner Area-->
    <div class="course-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title-wrapper">
                        <div class="section-title">
                            <h3>{{ $level->level }} @lang('layout_user.levels.title')</h3>
                            <p>@lang('layout_user.levels.describe_1') {{ $level->lessons->count() }} @lang('layout_user.levels.describe_2')</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($level->lessons as $lesson)
                <div class="col-md-4 col-sm-6 margin-bottom">
                    <div class="single-item">
                        <div class="single-item-image overlay-effect">
                            <a href="{{ route('user.lesson.detail', $lesson->id) }}"><img src="storage/lesson/{{ $lesson->image }}" alt=""></a>
                        </div>
                        <div class="single-item-text">
                            <h4><a href="{{ route('user.lesson.detail', $lesson->id) }}">{{ $lesson->name }}</a></h4>
                            <div class="single-item-text-info">
                                <span>@lang('layout_user.levels.date') <span>{{ $lesson->updated_at }}</span></span>
                            </div>
                            {!! str_limit($lesson->text, 123) !!}
                            <div class="single-item-content">
                                <div class="single-item-comment-view">
                                    <span><i class="zmdi zmdi-eye"></i>{{ $lesson->count_view }}</span>
                                    <span><i class="zmdi zmdi-comments"></i></span>
                                </div>
                                <div class="single-item-rating">
                                    <i class="zmdi {{ ($lesson->average -0.5)>0 ? 'zmdi-star': (($lesson->average -0.5)<0 ? 'zmdi-star-outline' : 'zmdi-star-half') }}"></i>
                                    <i class="zmdi {{ ($lesson->average -1.5)>0 ? 'zmdi-star': (($lesson->average -1.5)<0 ? 'zmdi-star-outline' : 'zmdi-star-half') }}"></i>
                                    <i class="zmdi {{ ($lesson->average -2.5)>0 ? 'zmdi-star': (($lesson->average -2.5)<0 ? 'zmdi-star-outline' : 'zmdi-star-half') }}"></i>
                                    <i class="zmdi {{ ($lesson->average -3.5)>0 ? 'zmdi-star': (($lesson->average -3.5)<0 ? 'zmdi-star-outline' : 'zmdi-star-half') }}"></i>
                                    <i class="zmdi {{ ($lesson->average -4.5)>0 ? 'zmdi-star': (($lesson->average -4.5)<0 ? 'zmdi-star-outline' : 'zmdi-star-half') }}"></i>
                                </div>
                            </div>   
                        </div>
                        <div class="button-bottom">
                            <a href="{{ route('user.lesson.detail', $lesson->id) }}" class="button-default">@lang('layout_user.levels.btn')</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
