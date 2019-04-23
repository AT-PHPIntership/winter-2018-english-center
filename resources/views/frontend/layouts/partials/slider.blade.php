<!--Slider Area Start-->
<div class="slider-area">
    <div class="preview-2">
            <div id="nivoslider" class="slides">
                @foreach ($sliders as $slider)
                    <img src="storage/slider/{{ $slider->image }}" alt="" title="#slider-1-caption{{ $slider->id }}"/>
                @endforeach
            </div> 
            @foreach ($sliders as $slider)
                <div id="slider-1-caption{{ $slider->id }}" class="nivo-html-caption nivo-caption">
                    <div class="banner-content slider-{{ $slider->id }}">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-7">
                                </div>
                                <div class="col-md-5">
                                    <div class="text-content-wrapper" style="margin: 90px 0px;">
                                        <div class="text-content style-slider">
                                            <!-- <h1 class="title1 wow fadeInUp" data-wow-duration="2000ms" data-wow-delay="0s">{{ substr($slider->title, 0, 18) }}<br>{{ substr($slider->title, 18, 18) }}<br>{{ substr($slider->title, 36, 18) }}</h1> -->
                                            <h1 class="title1 wow fadeInUp" data-wow-duration="2000ms" data-wow-delay="0s">{{ $slider->title }}</h1>
                                            <!-- <p class="sub-title wow fadeInUp hidden-xs" data-wow-duration="2900ms" data-wow-delay=".5s">{!! substr($slider->content, 0, 70) !!}<br>{!! substr($slider->content, 70, 70) !!}<br>{!! substr($slider->content, 140, 70) !!}<br>{!! substr($slider->content, 210, 70) !!}</p> -->
                                            <p class="sub-title wow fadeInUp hidden-xs" data-wow-duration="2900ms" data-wow-delay=".5s">{!! ($slider->content) !!}</p>
                                            <div class="banner-readmore wow fadeInUp" data-wow-duration="3600ms" data-wow-delay=".6s">
                                                <a class="button-default" href="{{ route('user.courses') }}">@lang('layout_user.slider.btn')</a>	                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
    </div>
</div>
<!--End of Slider Area-->

