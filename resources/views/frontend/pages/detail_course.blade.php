@extends('frontend.layouts.master')
@section('content')
<!--Breadcrumb Banner Area Start-->
<div class="breadcrumb-banner-area">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="breadcrumb-text">
          <h1 class="text-center">{{ __('layout_user.courses.course_detail.course_detail') }}</h1>
          <div class="breadcrumb-bar">
            <ul class="breadcrumb text-center">
              <li><a href="index.html">{{ __('layout_user.header.home') }}</a></li>
              <li>{{ __('layout_user.courses.course_detail.course_detail') }}</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--End of Breadcrumb Banner Area-->
<!--Course Details Area Start-->
<div class="course-details-area section-padding">
  <div class="container">
    <div class="row">
      <div class="col-md-9">
        <div class="course-details-content">
          <div class="single-course-details">
            <div class="row">
              <div class="col-md-6">
                <div class="overlay-effect">
                  <a href="#"><img alt="" src="img/details/1.jpg"></a>
                </div>
              </div>
              <div class="col-md-6">
                <div class="single-item-text">
                  <h4>Photoshop CC 2017</h4>
                  <div class="single-item-text-info">
                    <span>By: <span>Salim Rana</span></span>
                    <span>Date: <span>20.5.15</span></span>
                  </div>
                  <div class="course-text-content">
                    <p></p>
                    <p></p>
                  </div>
                  <div class="single-item-content">
                    <div class="single-item-comment-view">
                      <span><i class="zmdi zmdi-eye"></i>59</span>
                      <span><i class="zmdi zmdi-comments"></i>19</span>
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
              </div>
            </div>
          </div>
          <div class="course-duration">
            <div class="duration-title">
              <div class="text"><span>Lessons</span> <span class="text-right">Estimated Time</span></div>
            </div>
            <div class="duration-text">
              <div class="text"><span>Print design</span> <span class="text-right">15 days</span></div>
              <div class="text"><span>web design</span> <span class="text-right">10 days</span></div>
              <div class="text"><span>apps design</span> <span class="text-right">16 days</span></div>
              <div class="text"><span>web design</span> <span class="text-right">20 days</span></div>
              <div class="text"><span>web design</span> <span class="text-right">22 days</span></div>
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
                  <h4><a href="#">MD Tokdir Ali</a></h4>
                  <span class="reply"><a href="#">Reply</a></span>
                  <span class="comment-time">Posted on Jun 12, 2015 /</span>
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
                  <h4><a href="#">MD Kopal Ali</a></h4>
                  <span class="reply"><a href="#">Reply</a></span>
                  <span class="comment-time">Posted on Jun 12, 2015 /</span>
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
                  <h4><a href="#">MR Soytan Ali</a></h4>
                  <span class="reply"><a href="#">Reply</a></span>
                  <span class="comment-time">Posted on Jun 12, 2015 /</span>
                </div>
                <p></p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="sidebar-widget">
          <div class="single-sidebar-widget">
            <div class="tution-wrapper">
              <div class="tution-fee">
                <h1>$100</h1>
              </div>
              <div class="tutor-image">
                <img src="img/teacher/5.jpg" alt="">
              </div>
              <div class="single-teacher-text">
                <h3><a href="#">Salim Rana</a></h3>
                <h4>Teacher</h4>
                <p>There are mvarians of sages of Lorem Ipsum available, but the mrity  a have suffealteration in soe orm, by injected</p>
                <div class="social-links">
                  <a href="#"><i class="zmdi zmdi-facebook"></i></a>
                  <a href="#"><i class="zmdi zmdi-twitter"></i></a>
                  <a href="#"><i class="zmdi zmdi-google-old"></i></a>
                  <a href="#"><i class="zmdi zmdi-instagram"></i></a>
                </div>
              </div>
            </div>
          </div>
          <div class="single-sidebar-widget">
            <h4 class="title">Search by Tags</h4>
            <ul class="tags">
              <li><a href="#">Photoshop</a></li>
              <li><a href="#">Design</a></li>
              <li><a href="#">Tutorial</a></li>
              <li><a href="#">Courses</a></li>
              <li><a href="#">Premium</a></li>
              <li><a href="#">Designtuto</a></li>
            </ul>
          </div>
          <div class="single-sidebar-widget">
            <h4 class="title">{{ __('layout_user.courses.course_detail.related_courses') }}</h4>
            <div class="single-item">
              <div class="single-item-image overlay-effect">
                <a href="#"><img alt="" src="img/course/1.jpg"></a>
              </div>
              <div class="single-item-text">
                <h4><a href="#">Photoshop CC 2017</a></h4>
                <div class="single-item-text-info">
                  <span>By: <span>M S Nawaz</span></span>
                  <span>Date: <span>20.5.15</span></span>
                </div>
                <p></p>
                <div class="single-item-content">
                  <div class="single-item-comment-view">
                    <span><i class="zmdi zmdi-eye"></i>59</span>
                    <span><i class="zmdi zmdi-comments"></i>19</span>
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
                <a class="button-default" href="#">{{ __('layout_user.courses.btn') }}</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--End of Course Details Area-->
@endsection
