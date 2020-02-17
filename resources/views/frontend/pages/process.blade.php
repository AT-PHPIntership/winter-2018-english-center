@extends('frontend.layouts.master')
@section('content')
<!--Breadcrumb Banner Area Start-->
<div class="breadcrumb-banner-area">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="breadcrumb-text">
          <h1 class="text-center">{{ __('layout_user.wishlist.title') }}</h1>
          <div class="breadcrumb-bar">
            <ul class="breadcrumb text-center">
              <li><a href="{{ route('user.home') }}">{{ __('layout_user.header.home') }}</a></li>
              <li>{{ __('layout_user.wishlist.title') }}</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--End of Breadcrumb Banner Area-->
<div class="course-details-area section-padding">
  <div class="container">
    <div class="row">
      <div class="col-lg-4 col-12">
        <div class="info">
            <div class="setting-nav-tab">
                <ul class="nav nav-tab" role="tablist">
                @foreach ($courseLearn as $course)
                    <li role="presentation"><a class="js-course" data-course="{{ $course->id }}" data-token="{{ csrf_token() }}" data-user="{{Auth::user()->id}}">{{ $course->name }}</a></li>
                @endforeach
                </ul>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-8">
        <div class="setting-tab-pane">
          <div class="tab-content">
            <div role="tabpanel" class="tab-pane fade in active" id="product">
              <div class="setting-default setting-product">
                <div class="table-responsive">
                  
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
    </div>
  </div>
</div>
@endsection
