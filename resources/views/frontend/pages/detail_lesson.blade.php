@extends('frontend.layouts.master')
@section('content')
<!--Breadcrumb Banner Area Start-->
<div class="breadcrumb-banner-area">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="breadcrumb-text">
          <h1 class="text-center">{{ __('layout_user.lessons.lesson_detail.lesson_detail') }}</h1>
          <div class="breadcrumb-bar">
            <ul class="breadcrumb text-center">
              <li><a href="index.html">{{ __('layout_user.header.home') }}</a></li>
              <li>{{ __('layout_user.lessons.lesson_detail.lesson_detail') }}</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--End of Breadcrumb Banner Area-->
<!--News Details Area Start-->
<div class="news-details-area section-padding">
  <div class="container">
    <div class="row">
      <div class="col-lg-9 col-md-8">
        <div class="news-details-content">
          <div class="single-latest-item">
            <img src="img/details/2.jpg" alt="">  
            <div class="single-latest-text">
              <h3></h3>
              <div class="single-item-comment-view">
                <span><i class="zmdi zmdi-calendar-check"></i>25 jun 2050</span>
                <span><i class="zmdi zmdi-eye"></i>59</span>
                <span><i class="zmdi zmdi-comments"></i>19</span>
              </div>
              <p></p>
              <div class="quote-section">
                <p></p>
              </div>
              <p></p>
              <div class="tags-and-links">
                <div class="social-links">
                  <span>Share:</span>
                  <a href="#"><i class="zmdi zmdi-facebook"></i></a>
                  <a href="#"><i class="zmdi zmdi-twitter"></i></a>
                  <a href="#"><i class="zmdi zmdi-google-old"></i></a>
                  <a href="#"><i class="zmdi zmdi-instagram"></i></a>
                </div>
              </div>
              <div class="">
                  <h4>{{ __('layout_user.lessons.lesson_detail.exercise')}}</h4>
              </div>
            </div>
          </div>
          <div class="comments">
            <h4 class="title">{{ __('layout_user.courses.course_detail.cmt') }}</h4>
            <div class="single-comment">
              <div class="author-image">
                <img src="img/comment/1.jpg" alt="">
              </div>
              <div class="comment-text">
                <div class="author-info">
                  <h4><a href="#"></a></h4>
                  <span class="reply"><a href="#">Reply</a></span>
                  <span class="comment-time"></span>
                </div>
                <p></p>
              </div>
            </div>
            <div class="single-comment comment-reply">
              <div class="author-image">
                <img src="img/comment/2.jpg" alt="">
              </div>
              <div class="comment-text">
                <div class="author-info">
                  <h4><a href="#"></a></h4>
                  <span class="reply"><a href="#">Reply</a></span>
                  <span class="comment-time"></span>
                </div>
                <p></p>
              </div>
            </div>
            <div class="single-comment">
              <div class="author-image">
                <img src="img/comment/3.jpg" alt="">
              </div>
              <div class="comment-text">
                <div class="author-info">
                  <h4><a href="#"></a></h4>
                  <span class="reply"><a href="#">Reply</a></span>
                  <span class="comment-time"></span>
                </div>
                <p></p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-4">
        <div class="sidebar-widget">
          <div class="single-sidebar-widget">
            <h4 class="title">{{ __('layout_user.lessons.lesson_detail.recent_lesson') }}</h4>
            <div class="recent-content">
              <div class="recent-content-item">
                <a href="#"><img src="img/event/7.jpg" alt=""></a>
                <div class="recent-text">
                  <h4><a href="#">Learn English in</a></h4>
                  <div class="single-item-comment-view">
                    <span><i class="zmdi zmdi-eye"></i>59</span>
                    <span><i class="zmdi zmdi-comments"></i>19</span>
                  </div>
                  <p></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--End of News Details Area-->
@endsection
