<header>
    <div class="header-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-5 hidden-xs">
                    <span>@lang('layout_user.header.title')</span>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-7 col-xs-12">
                    <div class="header-top-right">
                        <div class="content"><a href="#"><i class="zmdi zmdi-account"></i>@lang('layout_user.header.login')</a>
                        </div>
                        <div class="content"><a href="#"><i class="zmdi zmdi-account"></i>@lang('layout_user.header.register')</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-logo-menu sticker">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-12">
                    <div class="logo">
                        <a href=""><img src="front_end/img/logo/logo.png" alt="EDUCAT"></a>
                    </div>
                </div>
                <div class="col-md-9 hidden-sm hidden-xs">
                    <div class="mainmenu-area">
                        <div class="mainmenu">
                            <nav>
                                <ul id="nav">
                                    <li class="current"><a href="">@lang('layout_user.header.home')</a></li>
                                    <li><a href="">@lang('layout_user.header.about')</a></li>
                                    <li><a href="">@lang('layout_user.header.courses')</a>
                                        <ul class="sub-menu">
                                            <li>
                                                <a href="">bxbbx</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a href="index.html">Features</a>
                                                        <ul class="sub-menu">
                                                            <li><a href="#">Sliders<i class="zmdi zmdi-chevron-right"></i></a>
                                                                <ul class="inside-menu">
                                                                    <li><a href="slider-style-1.html">Slider Style 1</a></li>
                                                                    <li><a href="slider-style-2.html">Slider Style 2</a></li>
                                                                    <li><a href="slider-style-3.html">Slider Style 3</a></li>
                                                                    <li><a href="background-image.html">Image Background </a></li>
                                                                    <li><a href="image-overlay-light.html">Overlay Light </a></li>
                                                                    <li><a href="image-overlay-dark.html">Overlay Dark </a></li>
                                                                    <li><a href="video-background.html">Video Background </a></li>
                                                                    <li><a href="fixed-image.html">Fixed Image</a></li>
                                                                    <li><a href="overlay-fixed-image.html">Overlay Fixed Image</a></li>
                                                                    <li><a href="text-animation-1.html">Text Animation 1 </a></li>
                                                                    <li><a href="text-animation-2.html">Text Animation 2 </a></li>
                                                                    <li><a href="text-animation-3.html">Text Animation 3 </a></li>
                                                                </ul>
                                                            </li>
                                                            <li><a href="#">Menu Style<i class="zmdi zmdi-chevron-right"></i></a>
                                                                <ul class="inside-menu">
                                                                    <li><a href="theme-menu-1.html">Theme Menu 1</a></li>
                                                                    <li><a href="theme-menu-2.html">Theme Menu 2</a></li>
                                                                    <li><a href="theme-menu-3.html">Theme Menu 3</a></li>
                                                                    <li><a href="without-top-bar.html">Without Top Bar</a></li>
                                                                    <li><a href="menu-center.html">Menu Center</a></li>
                                                                    <li><a href="menu-transparent.html">Transparent</a></li>
                                                                    <li><a href="menu-semi-transparent.html">Semi Transparent</a></li>
                                                                    <li><a href="menu-dark.html">Menu Dark</a></li>
                                                                    <li><a href="borderd-menu.html">Menu Border</a></li>
                                                                    <li><a href="menu-top-border.html">Top Border Hover</a></li>
                                                                    <li><a href="menu-sticky.html">Menu Sticky</a></li>
                                                                    <li><a href="menu-non-sticky.html">Menu Non Sticky</a></li>
                                                                </ul>
                                                            </li>
                                                            <li><a href="#">Page Title<i class="zmdi zmdi-chevron-right"></i></a>
                                                                <ul class="inside-menu">
                                                                    <li><a href="breadcrumb-dark.html">Title Dark</a></li>
                                                                    <li><a href="breadcrumb-fixed.html">Title Fixed</a></li>
                                                                    <li><a href="breadcrumb-image.html">Title Image</a></li>
                                                                    <li><a href="breadcrumb-transparent.html">Title Transparent</a></li>
                                                                    <li><a href="breadcrumb-left.html">Title Left</a></li>
                                                                    <li><a href="breadcrumb-right.html">Title Right</a></li>
                                                                </ul>
                                                            </li>
                                                            <li><a href="#">Footer Style<i class="zmdi zmdi-chevron-right"></i></a>
                                                                <ul class="inside-menu">
                                                                    <li><a href="footer-style-1.html">Footer Style 1</a></li>
                                                                    <li><a href="footer-style-2.html">Footer Style 2</a></li>
                                                                    <li><a href="footer-style-3.html">Footer Style 3</a></li>
                                                                    <li><a href="footer-style-4.html">Footer Style 4</a></li>
                                                                </ul>
                                                            </li>
                                                        </ul>
                                                    </li>
                                    <li><a href="">@lang('layout_user.header.level')</a>
                                        <ul class="sub-menu">
                                            <li><a href=""></a></li>
                                        </ul>
                                    </li>
                                    <li><a href="">@lang('layout_user.header.contact')</a></li>
                                </ul>
                            </nav>
                        </div>
                        <ul class="header-search">
                            <li class="search-menu">
                                <i id="toggle-search" class="zmdi zmdi-search-for"></i>
                            </li>
                        </ul>
                        <!--Search Form-->
                        <div class="search">
                            <div class="search-form">
                                <form id="search-form" action="#">
                                    <input type="search" placeholder="Search here..." name="search" />
                                    <button type="submit">
                                        <span><i class="fa fa-search"></i></span>
                                    </button>
                                </form>                                
                            </div>
                        </div>
                        <!--End of Search Form-->
                    </div> 
                </div>
            </div>
        </div>
    </div>  
</header>
