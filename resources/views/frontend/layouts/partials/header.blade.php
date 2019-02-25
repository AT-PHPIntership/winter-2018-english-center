<header>
  <div class="header-top">
    <div class="container">
      <div class="row">
          <div class="col-lg-7 col-md-6 col-sm-5 hidden-xs">
              <span>@lang('layout_user.header.title')</span>
          </div>
          <div class="col-lg-5 col-md-6 col-sm-7 col-xs-12">
              <div class="header-top-right">
                  @if(!Auth::check())
                      <div class="content"><a href="{{ route('user.login') }}"><i class="zmdi zmdi-account"></i>@lang('layout_user.header.login')</a>
                      </div>
                      <div class="content"><a href="{{ route('user.register') }}"><i class="zmdi zmdi-account"></i>@lang('layout_user.header.register')</a>
                      </div>
                  @else
                      <div class="content"><a href="{{ route('user.profiles.show') }}"><i class="zmdi zmdi-account"></i>{{ Auth::user()->userProfile->name }}</a>
                      </div>
                      <div class="content"><a href="{{ route('user.logout') }}"><i class="zmdi zmdi-account"></i>@lang('layout_user.logout')</a>
                      </div>
                  @endif
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
            <a href="{{ route('user.home') }}"><img src="front_end/img/logo/logo.png" alt="EDUCAT"></a>
          </div>
        </div>
        <div class="col-md-9 hidden-sm hidden-xs">
          <div class="mainmenu-area">
            <div class="mainmenu">
              <nav>
                <ul id="nav">
                  <li class="current"><a href="{{ route('user.home') }}">@lang('layout_user.header.home')</a></li>
                  <li><a href="{{ route('user.about') }}">@lang('layout_user.header.about')</a></li>
                  <li>
                    <a href="{{ route('user.course') }}">@lang('layout_user.header.courses')</a>
                    <ul class="sub-menu">
                      @foreach ($courses as $parentCourse)
                      <li>
                        <a href="#">{{ $parentCourse->name }}<i class="zmdi zmdi-chevron-right"></i></a>
                        <ul class="inside-menu">
                          @foreach ($parentCourse->children as $childrenCourse)
                            <li><a href="{{ route('user.course.detail', $childrenCourse->id) }}">{{ $childrenCourse->name }}</a></li>
                          @endforeach
                        </ul>
                      </li>
                      @endforeach
                    </ul>
                  </li>
                  <li>
                    <a href="{{ route('user.levels') }}">@lang('layout_user.header.level')</a>
                    <ul class="sub-menu">
                      @foreach ($levels as $level)
                      <li>
                          <a href="{{ route('user.level.detail', $level->id) }}">{{ $level->level }}</a>
                      </li>
                      @endforeach
                    </ul>
                  </li>
                  <li><a href="{{ route('user.contact') }}">@lang('layout_user.header.contact')</a></li>
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
                    <form id="search-form" action="{{ route('user.courses.search') }}" method="GET" autocomplete="off">
                        <input id="search" type="search" placeholder="Search here..." name="search" />
                        <button type="submit">
                            <span><i class="fa fa-search"></i></span>
                        </button>
                    </form>
                    <div class="dropdown-menu" id="courseList"></div>
                </div>
            </div>
            <!--End of Search Form-->
          </div>
        </div>
      </div>
    </div>
  </div>
</header>
