@extends('frontend.layouts.master')
@section('content')
    <div class="course-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title-wrapper">
                        <div class="section-title">
                            <h2>@lang('layout_user.search.find') {{ $search->total() }} @lang('layout_user.search.result') </h2>
                            <p></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($search as $course)
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
            </div>
            <div class="box-footer clearfix">
                <ul class="pagination pagination-sm no-margin pull-right">
                    {{ $search->links() }}
                </ul>
            </div>
        </div>
    </div>
@endsection
