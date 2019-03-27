@extends('frontend.layouts.master')
@section('content')
<!--Breadcrumb Banner Area Start-->
<div class="breadcrumb-banner-area">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="breadcrumb-text">
          <h1 class="text-center">{{ __('layout_user.subscribe.title') }}</h1>
          <div class="breadcrumb-bar">
            <ul class="breadcrumb text-center">
              <li><a href="index.html">{{ __('layout_user.header.home') }}</a></li>
              <li>{{ __('layout_user.subscribe.title') }}</li>
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
            <h2>{{ __('layout_user.subscribe.notification') }}</h2>
            <p>{{ __('layout_user.subscribe.notification1') }}</p>
             <form method="POST" action="{{ route('user.upgradeVip') }}" class="inline">
              @csrf
              @method('PUT')
              <input type="hidden" name="lesson_id" value="{{ explode("/",url()->previous())[5] }}">
              <button type="submit" class="btn btn-block subscribe">{{ __('layout_user.subscribe.title') }}</button>
            </form>
        </div>
    </div>
</div>
<!--End of Contact Form-->
@endsection
