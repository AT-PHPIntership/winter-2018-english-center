@extends('frontend.layouts.master')
@section('content')
    <div class="breadcrumb-banner-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb-text">
                        <h1 class="text-center">@lang('layout_user.rating.title') {{$ele}}</h1>
                        <div class="breadcrumb-bar">
                            <ul class="breadcrumb text-center">
                                <li><a href="{{ route('user.home') }}">{{ __('layout_user.header.home') }}</a></li>
                                <li>@lang('layout_user.rating.title') {{$ele}}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="product-details-area section-top-padding" style="
    margin-bottom: 100px;">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <div class="product-details-image">
                        @if($ele == 'lessons')
                        <img src="storage/lesson/{{ $common->image }}" alt="">
                        @else
                        <img src="{{ $common->image }}" alt="">
                        @endif    
                    </div>
                </div>
                <div class="col-md-6 col-sm-6">
                    <div class="product-details-content">
                        <form action="{{ route('user.rating', [ $ele, $common->id ]) }}" method="post">
                            @csrf
                            <h2 style="margin-bottom: 20px;">{{ $common->name }}</h2>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="star-rating">
                                        <span class="fa fa-star-o" data-rating="1"></span>
                                        <span class="fa fa-star-o" data-rating="2"></span>
                                        <span class="fa fa-star-o" data-rating="3"></span>
                                        <span class="fa fa-star-o" data-rating="4"></span>
                                        <span class="fa fa-star-o" data-rating="5"></span>
                                        @if (Auth::user()->ratings->pluck('ratingable_type')->contains($ele))
                                            @if (Auth::user()->ratings->pluck('ratingable_id')->contains($common->id))
                                                @foreach((Auth::user()->ratings) as $rate)
                                                    @if($rate->ratingable_id === $common->id)
                                                    <input type="hidden" name="rating-star" class="rating-value" value="{{ $rate->star }}">
                                                    @endif
                                                @endforeach
                                            @else 
                                                <input type="hidden" name="rating-star" class="rating-value" value="0">
                                            @endif
                                        @else 
                                            <input type="hidden" name="rating-star" class="rating-value" value="0">
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <p>@lang('layout_user.lessons.lesson_detail.rating.detail')</p>
                            <div class="comment-text">
                                @if (Auth::user()->ratings->pluck('ratingable_type')->contains($ele))
                                    @if (Auth::user()->ratings->pluck('ratingable_id')->contains($common->id))
                                        @foreach((Auth::user()->ratings) as $rate)
                                            @if($rate->ratingable_id === $common->id)
                                            <textarea class="form-control" id='comment-text' name="review">{{ $rate->content }}</textarea>
                                            @endif
                                        @endforeach
                                    @else 
                                        <textarea class="form-control" id='comment-text' name="review"></textarea>
                                    @endif
                                @else 
                                    <textarea class="form-control" id='comment-text' name="review"></textarea>
                                @endif
                            </div>
                            <button type="submit" class="button-default">@lang('layout_user.lessons.lesson_detail.rating.btn')</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
