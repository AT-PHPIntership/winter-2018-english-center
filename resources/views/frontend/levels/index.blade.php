@extends('frontend.layouts.master')
@section('content')
    @foreach ($levels as $level)
    <div class="course-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title-wrapper">
                        <div class="section-title">
                            <h3>{{ $level->level }} @lang('layout_user.levels.title')</h3>
                            <p>@lang('layout_user.levels.intro')</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($level->lessons as $lesson)
                <div class="col-md-4 col-sm-6 margin-bottom">
                    <div class="single-item">
                        <div class="single-item-image overlay-effect">
                            <a href="#"><img src="{{ $lesson->image }}" alt=""></a>
                        </div>
                        <div class="single-item-text">
                            <h4><a href="#">{{ $lesson->name }}</a></h4>
                            <div class="single-item-text-info">
                                <span>@lang('layout_user.levels.date') <span>{{ $lesson->updated_at }}</span></span>
                            </div>
                            <p>{{ $lesson->text }}</p>
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
                            <a href="#" class="button-default">@lang('layout_user.levels.btn')</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    @endforeach
@endsection
