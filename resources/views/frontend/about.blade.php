@extends('frontend.layouts.master')
@section('content')
    <!--Breadcrumb Banner Area Start-->
    <div class="breadcrumb-banner-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb-text">
                        <h1 class="text-center">@lang('layout_user.aboutus.title')</h1>
                        <div class="breadcrumb-bar">
                            <ul class="breadcrumb text-center">
                                <li><a href="{{ route('user.home') }}">@lang('layout_user.aboutus.home')</a></li>
                                <li>@lang('layout_user.aboutus.title')</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End of Breadcrumb Banner Area-->
    <!--About Page Area Start-->
    <div class="about-page-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title-wrapper">
                        <div class="section-title">
                            <h3>@lang('layout_user.aboutus.who')</h3>
                            <p>@lang('layout_user.aboutus.content')</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="about-text-container">
                        <p><span>@lang('layout_user.aboutus.welcome')</span> {!! $system->aboutus !!}</p>
                        <div class="about-us">
                            <span>@lang('layout_user.aboutus.span_1')</span>
                            <span>@lang('layout_user.aboutus.span_2')</span>
                            <span>@lang('layout_user.aboutus.span_3')</span>
                            <span>@lang('layout_user.aboutus.span_4')</span>
                        </div>    
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="skill-image">
                        <img src="front_end/img/banner/6.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End of About Page Area-->
    <!--Skill And Experience Area Start-->
    <div class="skill-and-experience-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title-wrapper">
                        <div class="section-title style">
                            <h3>@lang('layout_user.aboutus.skill')</h3>
                            <p>@lang('layout_user.aboutus.content')</p>
                        </div>
                    </div> 
                </div>       
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <div class="experience-skill-wrapper">
                        <div class="skill-bar-item">
                            <span>@lang('layout_user.aboutus.programming')</span>
                            <div class="progress">
                                <div class="progress-bar wow fadeInLeft" data-progress="80%" style="width: 80%;" data-wow-duration="1.5s" data-wow-delay="1.2s">
                                    <span class="text-top">@lang('layout_user.aboutus.programming_%')</span>
                                </div>
                            </div>
                        </div>
                        <div class="skill-bar-item">
                            <span>@lang('layout_user.aboutus.designing')</span>
                            <div class="progress">
                                <div class="progress-bar wow fadeInLeft" data-progress="75%" style="width: 75%;" data-wow-duration="1.5s" data-wow-delay="1.2s">
                                    <span class="text-top">@lang('layout_user.aboutus.designing_%')</span>
                                </div>
                            </div>
                        </div>
                        <div class="skill-bar-item">
                            <span>@lang('layout_user.aboutus.create')</span>
                            <div class="progress">
                                <div class="progress-bar wow fadeInLeft" data-progress="85%" style="width: 85%;" data-wow-duration="1.5s" data-wow-delay="1.2s">
                                    <span class="text-top">@lang('layout_user.aboutus.create_%')</span>
                                </div>
                            </div>
                        </div>  
                    </div>    
                </div>
                <div class="col-md-6 col-sm-6">
                    <div class="experience-skill-wrapper">
                        <div class="skill-bar-item">
                            <span>@lang('layout_user.aboutus.levels')</span>
                            <div class="progress">
                                <div class="progress-bar wow fadeInLeft" data-progress="50%" style="width: 50%;" data-wow-duration="1.5s" data-wow-delay="1.2s">
                                    <span class="text-top">@lang('layout_user.aboutus.levels_%')</span>
                                </div>
                            </div>
                        </div>
                        <div class="skill-bar-item">
                            <span>@lang('layout_user.aboutus.courses')</span>
                            <div class="progress">
                                <div class="progress-bar wow fadeInLeft" data-progress="60%" style="width: 60%;" data-wow-duration="1.5s" data-wow-delay="1.2s">
                                    <span class="text-top">@lang('layout_user.aboutus.courses_%')</span>
                                </div>
                            </div>
                        </div>
                        <div class="skill-bar-item">
                            <span>@lang('layout_user.aboutus.lessons')</span>
                            <div class="progress">
                                <div class="progress-bar wow fadeInLeft" data-progress="70%" style="width: 70%;" data-wow-duration="1.5s" data-wow-delay="1.2s">
                                    <span class="text-top">@lang('layout_user.aboutus.lessons_%')</span>
                                </div>
                            </div>
                        </div>  
                    </div>    
                </div>
            </div>
        </div>
    </div>
    <!--End of Skill And Experience Area-->
    <!--Members Area Start-->
    <div class="teachers-area padding-top">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title-wrapper">
                        <div class="section-title">
                            <h3>@lang('layout_user.aboutus.members')</h3>
                            <p>@lang('layout_user.aboutus.content')</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-6">
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="single-teacher-item">
                        <div class="single-teacher-image">
                            <a href="#"><img src="front_end/img/member/1.jpg" alt=""></a>
                        </div>
                        <div class="single-teacher-text">
                            <h3><a href="#">@lang('layout_user.aboutus.name1')</a></h3>
                            <h4>@lang('layout_user.aboutus.member')</h4>
                            <p>@lang('layout_user.aboutus.position')</p>
                            <div class="social-links">
                                <a href="#"><i class="zmdi zmdi-facebook"></i></a>
                                <a href="#"><i class="zmdi zmdi-twitter"></i></a>
                                <a href="#"><i class="zmdi zmdi-google-old"></i></a>
                                <a href="#"><i class="zmdi zmdi-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="single-teacher-item">
                        <div class="single-teacher-image">
                            <a href="#"><img src="front_end/img/member/2.jpg" alt=""></a>
                        </div>
                        <div class="single-teacher-text">
                            <h3><a href="#">@lang('layout_user.aboutus.name2')</a></h3>
                            <h4>@lang('layout_user.aboutus.member')</h4>
                            <p>@lang('layout_user.aboutus.position')</p>
                            <div class="social-links">
                                <a href="#"><i class="zmdi zmdi-facebook"></i></a>
                                <a href="#"><i class="zmdi zmdi-twitter"></i></a>
                                <a href="#"><i class="zmdi zmdi-google-old"></i></a>
                                <a href="#"><i class="zmdi zmdi-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                </div>
            </div>
        </div>
    </div>
    <!--End of Members Area-->
@endsection
