@extends('frontend.layouts.master')
@section('content')
<!--Breadcrumb Banner Area Start-->
<div class="breadcrumb-banner-area">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="breadcrumb-text">
          <h1 class="text-center">{{ __('layout_user.unfinished.title')}}</h1>
          <div class="breadcrumb-bar">
            <ul class="breadcrumb text-center">
              <li><a href="{{ route('user.home') }}">{{ __('layout_user.header.home') }}</a></li>
              <li>not Accept</li>
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
        <div id="expired-notice">
            <h2>{{ __('layout_user.unfinished.notification') }}</h2>
            <h5>{{ __('layout_user.unfinished.notification1') }}</h5>
            <p style="color: #F36D00">{{ __('layout_user.unfinished.goal') }}</p>
        </div>
    </div>
</div>
<!--End of News Details Area-->
@endsection
