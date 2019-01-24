<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title') - @lang('layout_user.title')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <base href="{{asset('')}}">
    @include('frontend.layouts.partials.styles')
</head>
<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        @include('frontend.layouts.partials.header')
        @include('frontend.layouts.partials.slider')
        <div class="content-wrapper">
            @yield('content')
        </div>
        @include('frontend.layouts.partials.footer')
        @include('frontend.layouts.partials.scripts')
    </div>
</body>
</html>
