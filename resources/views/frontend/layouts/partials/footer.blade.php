@foreach ($systems as $system)
<!--Newsletter Area Start-->
<div class="newsletter-area">
    <div class="container">
        <div class="row">
            <div class="col-md-5 col-sm-5">
                <div class="newsletter-content">
                    <h3>@lang('layout_user.footer.subcribe')</h3>
                    <h2>@lang('layout_user.footer.letter')</h2>
                </div>
            </div>
            <div class="col-md-7 col-sm-7">
                <div class="newsletter-form">
                    <form action="#">
                        <div class="subscribe-form">
                            <input type="email" name="email" placeholder="@lang('layout_user.footer.placeholder')">
                            <button type="submit">@lang('layout_user.footer.subcribe')</button>
                        </div>    
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!--End of Newsletter Area-->
<!--Footer Widget Area Start-->
<div class="footer-widget-area">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-4">
                <div class="single-footer-widget">
                    <div class="footer-logo">
                        <a href=""><img src="front_end/img/logo/footer.png" alt=""></a>
                    </div>
                    <p>@lang('layout_user.footer.social')</p>
                    <div class="social-icons">
                        <a href="#"><i class="zmdi zmdi-facebook"></i></a>
                        <a href="#"><i class="zmdi zmdi-rss"></i></a>
                        <a href="#"><i class="zmdi zmdi-google-plus"></i></a>
                        <a href="#"><i class="zmdi zmdi-pinterest"></i></a>
                        <a href="#"><i class="zmdi zmdi-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-4">
                <div class="single-footer-widget">
                    <h3>@lang('layout_user.footer.info')</h3>
                    <span><i class="fa fa-phone"></i>{{ $system->phone }}</span>
                    <span><i class="fa fa-envelope"></i>{{ $system->email }}</span>
                    <span><i class="fa fa-globe"></i>{{ $system->web }}</span>
                    <span><i class="fa fa-map-marker"></i>{{ $system->address }}</span>
                </div>
            </div>
            <div class="col-md-3 hidden-sm">
                <div class="single-footer-widget">
                    <h3>@lang('layout_user.footer.useful_link')</h3>
                    <ul class="footer-list">
                        <li><a href="#">Our Courses</a></li>
                        <li><a href="#">Courses Categories</a></li>
                        <li><a href="#">Support</a></li>
                        <li><a href="#">Terms &amp; Conditions</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-3 col-sm-4">
                <div class="single-footer-widget">
                    <h3>@lang('layout_user.footer.insta')</h3>
                    <div class="instagram-image">
                        <div class="footer-img">
                            <a href="#"><img src="front_end/img/footer/1.jpg" alt=""></a>
                        </div>
                        <div class="footer-img">
                            <a href="#"><img src="front_end/img/footer/2.jpg" alt=""></a>
                        </div>
                        <div class="footer-img">
                            <a href="#"><img src="front_end/img/footer/3.jpg" alt=""></a>
                        </div>
                        <div class="footer-img">
                            <a href="#"><img src="front_end/img/footer/4.jpg" alt=""></a>
                        </div>
                        <div class="footer-img">
                            <a href="#"><img src="front_end/img/footer/5.jpg" alt=""></a>
                        </div>
                        <div class="footer-img">
                            <a href="#"><img src="front_end/img/footer/6.jpg" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--End of Footer Widget Area-->
<!--Footer Area Start-->
<footer class="footer-area">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-7">
                <span>@lang('layout_user.footer.copyright') &copy; @lang('layout_user.footer.create_by') <a href="#">@lang('layout_user.footer.author')</a></span>
            </div>
            <div class="col-md-6 col-sm-5">
                <div class="column-right">
                    <span>@lang('layout_user.footer.policy') &amp; @lang('layout_user.footer.conditions')</span>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--End of Footer Area-->
@endforeach
