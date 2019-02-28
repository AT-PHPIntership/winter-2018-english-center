@extends('frontend.layouts.master')
@section('content')
<!--Breadcrumb Banner Area Start-->
<div class="breadcrumb-banner-area">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="breadcrumb-text">
          <h1 class="text-center">{{ __('layout_user.subcribe.title') }}</h1>
          <div class="breadcrumb-bar">
            <ul class="breadcrumb text-center">
              <li><a href="index.html">{{ __('layout_user.header.home') }}</a></li>
              <li>{{ __('layout_user.subcribe.title') }}</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--End of Breadcrumb Banner Area-->
<!--Contact Form Area Start-->
<div class="contact-form-area section-padding">
    <div class="container">
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-ban"></i> {{ __('layout_user.subcribe.notification') }}</h4>
            <p>{{ __('layout_user.subcribe.notification1') }}</p>
        </div>
        <div class="row">
            <!--Shop Grid Area Start-->
            <div class="col-md-6 col-xs-offset-3">
                <div class="single-product-item">
                    <div class="single-product-image">
                        <a href="#"><img src="https://lorempixel.com/200/200/?61623" alt=""></a>
                        <h1>REQUEST</h1>
                    </div>
                    <div class="single-product-text">
                        <h4><a href="#">Subscribe Member VIP</a></h4>
                        <form method="POST" action="{{ route('user.upgradeVip') }}" class="inline">
                          @csrf
                          @method('PUT')
                          <input type="hidden" name="lesson_id" value="{{ explode("/",url()->previous())[5] }}">
                          <button type="submit" class="btn btn-block subscribe">Subscribe</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--End of Contact Form-->
@endsection
