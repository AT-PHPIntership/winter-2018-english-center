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
              <img src="storage/lesson/{{ $lessons->image }}" alt="">
            </div>
            <div class="single-latest-text">
              <h3>{{ $lessons->name }}</h3>
              <div class="single-item-comment-view">
                <span><i class="zmdi zmdi-calendar-check"></i>{{ $lessons->created_at }}</span>
                <span><i class="zmdi zmdi-eye"></i>{{ $countView->count_view }}</span>
              </div>
              <div class="single-item-rating">
                  <i class="zmdi {{ ($lessons->average -0.5)>0 ? 'zmdi-star': (($lessons->average -0.5)<0 ? 'zmdi-star-outline' : 'zmdi-star-half') }}"></i>
                  <i class="zmdi {{ ($lessons->average -1.5)>0 ? 'zmdi-star': (($lessons->average -1.5)<0 ? 'zmdi-star-outline' : 'zmdi-star-half') }}"></i>
                  <i class="zmdi {{ ($lessons->average -2.5)>0 ? 'zmdi-star': (($lessons->average -2.5)<0 ? 'zmdi-star-outline' : 'zmdi-star-half') }}"></i>
                  <i class="zmdi {{ ($lessons->average -3.5)>0 ? 'zmdi-star': (($lessons->average -3.5)<0 ? 'zmdi-star-outline' : 'zmdi-star-half') }}"></i>
                  <i class="zmdi {{ ($lessons->average -4.5)>0 ? 'zmdi-star': (($lessons->average -4.5)<0 ? 'zmdi-star-outline' : 'zmdi-star-half') }}"></i>
              </div>
              <strong>Vocabulary:</strong>
              <div class="single-item-comment-view">
                <table border="2" cellspacing="10" cellpadding="10" id='{{count($lessons->vocabularies)}}'>
                  <tbody>
                    @foreach ($lessons->vocabularies as $key => $items)
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
                  <p>{!! $lessons->text !!}</p>
                </div>
                <div class="detail-video">
                  <iframe width="420" height="345" src="{{ $lessons->video }}">
                  </iframe>
                </div>
              </div>
              <div>
                <ul class="sidebar-menu" data-widget="tree">
                  <li class="treeview">
                    <a>
                      <span>
                        <h3><i class="fa fa-edit"></i><strong>{{ __('layout_user.lessons.lesson_detail.exercise')}}</strong></h3>
                      </span>
                    </a>
                    <ul class="treeview-menu" style="display: none;">
                      <div class="exercises" data-course='{{ $lessons->course->id }}' data-lesson= "{{$lessons->id}}" data-question='{{$lessons->exercises->pluck('questions')->
                        map(function ($item, $key) {
                        return collect($item)->count();
                        })->sum()}}'>
                        @foreach ($lessons->exercises as $key => $exercises)
                        <div class="comment_bai_hoc clear">
                          <div class="clear"></div>
                          <div class="ghichu0 clear bo_goc">
                            <h4 class="exercises[{{ $key }}][title]">{{ $exercises->title }}</h4>
                          </div>
                          @foreach ($exercises->questions as $q => $questions)
                          <div class="details" data-user='{{ Auth::user()->id }}' data-token='{{ csrf_token() }}'>
                            <div class="basic_ques">
                              <p class="basic_index">{{ $q + 1}}</p>
                              <div class="basic_index" id="exercises[{{ $key }}][questions][{{ $q }}][content]">{{ $questions->content }}</div>
                              <div class="form-group col-lg-12">
                                @foreach ($questions->answers as $a => $answers)
                                <div class="radio-exercise col-lg-3">
                                  <label>
                                  <input type="radio" name="exercises[{{ $key }}]questions[{{ $q }}][answers][]" id="{{ $answers->id }}" value="{{ $a }}">
                                  {{ $answers->answers }} 
                                  </label>
                                </div>
                                @endforeach
                              </div>
                            </div>
                          </div>
                          @endforeach
                        </div>
                        @endforeach
                      </div>
                      <div class="row">
                        <div class="basic_alert_note">{{ __('layout_user.lessons.lesson_detail.complete_exercise')}}<strong> {{ __('common.btn') }}</strong> {{ __('layout_user.lessons.lesson_detail.complete_exercise_below')}}</div>
                        <div class="box_bt_ctrl">
                          <button type="button" class="btn btn-success">
                          <i class="fa fa-credit-card"></i> {{ __('common.btn') }}
                          </button>
                        </div>
                      </div>
                    </ul>
                  </li>
                </ul>
              </div>
              @if ($errors->has('radio'))
              <span class="text-red help is-danger">* {{ $errors->first('radio') }}</span>
              @endif
              <div class="result-lesson">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 ">
              <div class="pagination-content">
              </div>
            </div>
          </div>
          @foreach((Auth::user()->lessons) as $lesson_user)
              @if($lesson_user->id === $lessons->id)
              <div class="rating-link">
                <div class="single-item-rating user-rating">
                  <i class="zmdi zmdi-star"></i>
                  <i class="zmdi zmdi-star"></i>
                  <i class="zmdi zmdi-star"></i>
                  <i class="zmdi zmdi-star"></i>
                  <i class="zmdi zmdi-star"></i>
                </div>
                <a class="rating" href="{{ route('user.rating', ['lessons', $lessons->id ])}}">@lang('layout_user.lessons.lesson_detail.rating.title')</a>
              </div>
              @else
              <div class="rating-link">
              </div>
              @endif
          @endforeach
          <div class="comments">
            <h4 class="title">{{ __('layout_user.courses.course_detail.cmt') }}</h4>
            <div class="single-comment">
              <div class="comment-text">
                <textarea class="form-control" id='comment-text' name="review" placeholder="{{ __('layout_user.lessons.lesson_detail.comment.enter_comment') }}"></textarea>
              </div>
              <div class="col-lg-2 pull-right">
                <input class="btn btn-block" id='comment-button' {{(Auth::user()) ? 'data-user=' .Auth::user()->id : ''}} data-element='{{ $lessons->id }}' data-token="{{ csrf_token() }}" value="{{ __('layout_user.lessons.lesson_detail.comment.btn-comment') }}" type="submit">
              </div>
            </div>
            <ol class="comment-list" id="commentList">
              @foreach ($lessons->comments as $comment)
              <li class="comment-border" data-id='{{$comment->id}}'>
                <article id="{{$comment->id}}">
                  <img alt='' src="{{ $comment->user->userProfile['url'] }}" class='avatar avatar-60 photo'/>            
                  <div class="comment-des">
                    <div class="comment-by">
                      <p class="author"><strong>{{$comment->user->userProfile['name'] }}</strong></p>
                      <p class="date"><a><time>{{$comment->created_at}}</time></a>
                        @if(Auth::user()->id == $comment->user_id )
                         - <a class="edit-comment" id="{{$comment->id}}">Edit</a> - <a class="delete-comment" id="{{$comment->id}}">Delete</a>
                        @endif
                        <span class="reply"><a class="add-reply" id='{{$comment->id}}'>Reply</a></span>
                    </div>
                    <section>
                      <p>{{$comment->content}}</p>
                    </section>
                  </div>
                </article>
                @foreach ($comment->children as $reply)
                <ol class="children">
                  <li class="children" id="commentChildren">
                    <article id="{{$reply->id}}" class="comment">
                      <img alt='' src="{{ $reply->user->userProfile['url'] }}" class='avatar avatar-60 photo'/>            
                      <div class="comment-des">
                        <div class="comment-by">
                          <p class="author"><strong>{{$reply->user->userProfile['name'] }}</strong></p>
                          <p class="date"><a><time>{{$reply->created_at}}</time></a>
                            @if(Auth::user()->id == $comment->user_id )
                             - <a class="edit-comment" id="{{$comment->id}}">Edit</a> - <a class="delete-comment" id="{{$comment->id}}">Delete</a>
                            @endif
                        </div>
                        <section>
                          <p>{{$reply->content}}</p>
                        </section>
                      </div>
                    </article>
                  </li>
                </ol>
                @endforeach
              </li>
              @endforeach
            {{-- </ol> --}}
            @foreach($rates as $rate)
              @if($rate->ratingable_type === 'lessons')
                @if($rate->ratingable_id === $lessons->id)
                  <li class="comment-border" data-id='{{ $rate->id }}'>
                    <article id="{{$rate->id}}">
                      <img alt='' src="{{ $rate->user->userProfile['url'] }}" class='avatar avatar-60 photo'/>            
                      <div class="comment-des">
                        <div class="comment-by">
                              <p class="author"><strong>{{$rate->user->userProfile['name'] }}</strong></p>
                              <div class="single-item-rating" style="float: none;">
                              <i class="zmdi {{ ($rate->star -0.5)>0 ? 'zmdi-star': (($rate->star -0.5)<0 ? 'zmdi-star-outline' : 'zmdi-star-half') }}"></i>
                              <i class="zmdi {{ ($rate->star -1.5)>0 ? 'zmdi-star': (($rate->star -1.5)<0 ? 'zmdi-star-outline' : 'zmdi-star-half') }}"></i>
                              <i class="zmdi {{ ($rate->star -2.5)>0 ? 'zmdi-star': (($rate->star -2.5)<0 ? 'zmdi-star-outline' : 'zmdi-star-half') }}"></i>
                              <i class="zmdi {{ ($rate->star -3.5)>0 ? 'zmdi-star': (($rate->star -3.5)<0 ? 'zmdi-star-outline' : 'zmdi-star-half') }}"></i>
                              <i class="zmdi {{ ($rate->star -4.5)>0 ? 'zmdi-star': (($rate->star -4.5)<0 ? 'zmdi-star-outline' : 'zmdi-star-half') }}"></i>
                          </div>
                          <p class="date"><a><time>{{$rate->created_at}}</time></a>
                        </div>
                        <section>
                          <p>{{$rate->content}}</p>
                        </section>
                      </div>
                    </article>
                  </li>
                  @endif
                @endif
            @endforeach
            </ol>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-4">
        <div class="sidebar-widget">
          <div class="single-sidebar-widget">
            <h4 class="title">{{ __('layout_user.lessons.lesson_detail.recent_lesson') }}</h4>
            <div class="recent-content">
              @foreach ($recentLessons as $items)
              <div class="single-item">
                  <div class="single-item-image overlay-effect">
                      <a href="{{ route('user.lesson.detail', $items->id) }}"><img src="{{ $items->image }}" alt=""></a>
                  </div>
                  <div class="single-item-text">
                      <h4><a href="{{ route('user.lesson.detail', $items->id) }}">{{ $items->name }}</a></h4>
                      <div class="single-item-text-info">
                          <span>@lang('layout_user.levels.date') <span>{{ $items->updated_at }}</span></span>
                      </div>
                      <p>{{ str_limit($items->text, 80) }}</p>
                      <div class="single-item-content">
                          <div class="single-item-comment-view">
                              <span><i class="zmdi zmdi-eye"></i>{{ $items->count_view }}</span>
                              <span><i class="zmdi zmdi-comments"></i></span>
                          </div>
                          <div class="single-item-rating">
                              <i class="zmdi {{ ($items->average -0.5)>0 ? 'zmdi-star': (($items->average -0.5)<0 ? 'zmdi-star-outline' : 'zmdi-star-half') }}"></i>
                              <i class="zmdi {{ ($items->average -1.5)>0 ? 'zmdi-star': (($items->average -1.5)<0 ? 'zmdi-star-outline' : 'zmdi-star-half') }}"></i>
                              <i class="zmdi {{ ($items->average -2.5)>0 ? 'zmdi-star': (($items->average -2.5)<0 ? 'zmdi-star-outline' : 'zmdi-star-half') }}"></i>
                              <i class="zmdi {{ ($items->average -3.5)>0 ? 'zmdi-star': (($items->average -3.5)<0 ? 'zmdi-star-outline' : 'zmdi-star-half') }}"></i>
                              <i class="zmdi {{ ($items->average -4.5)>0 ? 'zmdi-star': (($items->average -4.5)<0 ? 'zmdi-star-outline' : 'zmdi-star-half') }}"></i>
                          </div>
                      </div>   
                  </div>
                  <div class="button-bottom">
                      <a href="{{ route('user.lesson.detail', $items->id) }}" class="button-default">@lang('layout_user.levels.btn')</a>
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
