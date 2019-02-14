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
            <div class="single-event-image">
              <img src="{{ $lesson->image }}" alt="">
            </div>
            <div class="single-latest-text">
              <h3>{{ $lesson->name }}</h3>
              <div class="single-item-comment-view">
                <span><i class="zmdi zmdi-calendar-check"></i>{{ $lesson->created_at }}</span>
                <span><i class="zmdi zmdi-eye"></i>{{ $lesson->count_view }}</span>
              </div>
              <strong>Vocabulary:</strong>
              <div class="single-item-comment-view">
                <table border="2" cellspacing="10" cellpadding="10" id='{{count($lesson->vocabularies)}}'>
                  <tbody>
                    @foreach ($lesson->vocabularies as $key => $items)
                    <tr>
                      <td>{{ $items->vocabulary }}</td>
                      <td>{{ $items->word_type }}</td>
                      <td style="cursor:pointer;">
                        <a type="button" class="uba_audioButton" >
                          <audio>
                            <source src="{{$items->sound}}" type="audio/mpeg">
                          </audio>
                        </a>
                      </td>
                      <td>{{ $items->means }}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <div class="col-md-12 detail-text-video">
                <div class="detail-text">
                  <p>{{ $lesson->text }}></p>
                </div>
                <div class="detail-video">
                  <iframe width="420" height="345" src="{{ $lesson->video }}">
                  </iframe>
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
            @foreach ($recentLessons as $items)
              <div class="recent-content-item">
                <a href="{{ route('user.lesson.detail', $items->id) }}"><img src="{{ $items->image }}" alt=""></a>
                <div class="recent-text">
                  <h4><a href="">{{ $items->name }}</a></h4>
                  <div class="single-item-comment-view">
                    <span><i class="zmdi zmdi-eye"></i>{{ $items->count_view }}</span>
                  </div>
                  <p></p>
                </div>
              </div>
            @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--End of News Details Area-->
@endsection
