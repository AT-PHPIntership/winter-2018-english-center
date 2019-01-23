<header>
    <div class="header-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-5 hidden-xs">
                    <span>@lang('layout_public.header.title')</span>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-7 col-xs-12">
                    <div class="header-top-right">
                        <div class="content"><a href="#"><i class="zmdi zmdi-account"></i>@lang('layout_public.header.login')</a>
                        </div>
                        <div class="content"><a href="#"><i class="zmdi zmdi-account"></i>@lang('layout_public.header.register')</a>
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
                        <a href=""><img src="frontend/img/logo/logo.png" alt="EDUCAT"></a>
                    </div>
                </div>
                <div class="col-md-9 hidden-sm hidden-xs">
                    <div class="mainmenu-area">
                        <div class="mainmenu">
                            <nav>
                                <ul id="nav">
                                    <li class="current"><a href="">@lang('layout_public.header.home')</a></li>
                                    <li><a href="">@lang('layout_public.header.about')</a></li>
                                    <li><a href="">@lang('layout_public.header.courses')</a>
                                        <ul class="sub-menu">
                                            <li><a href=""></a></li>
                                        </ul>
                                    </li>
                                    <li><a href="shop-grid.html">@lang('layout_public.header.lesson')</a>
                                        <ul class="sub-menu">
                                            <li><a href=""></a></li>
                                        </ul>
                                    </li>
                                    <li><a href="shop-grid.html">@lang('layout_public.header.level')</a>
                                        <ul class="sub-menu">
                                            <li><a href=""></a></li>
                                        </ul>
                                    </li>
                                    <li><a href="contact.html">@lang('layout_public.header.contact')</a></li>
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
