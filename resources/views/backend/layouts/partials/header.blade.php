<header class="main-header">
  <!-- Logo -->
  <a href="index.html" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>A</b>LT</span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>@lang('layout_admin.header.admin')</b></span>
  </a>
  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
    {{-- <span class="sr-only">Toggle navigation</span> --}}
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    </a>
    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <!-- User Account: style can be found in dropdown.less -->
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          <img src="bower_components/admin-lte/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
          <span class="hidden-xs">Alexander Pierce</span>
          </a>
          <ul class="dropdown-menu">
            <!-- User image -->
            <li class="user-header">
              <img src="bower_components/admin-lte/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
              <p>
                Alexander Pierce - Web Developer
                <small>Member since Nov. 2012</small>
              </p>
            </li>
            <!-- Menu Body -->
            <li class="user-body">
              <div class="row">
                <div class="col-xs-4 text-center">
                  <a href="#">@lang('layout_admin.header.followers')</a>
                </div>
                <div class="col-xs-4 text-center">
                  <a href="#">@lang('layout_admin.header.sales')</a>
                </div>
                <div class="col-xs-4 text-center">
                  <a href="#">@lang('layout_admin.header.friends')</a>
                </div>
              </div>
              <!-- /.row -->
            </li>
            <!-- Menu Footer-->
            <li class="user-footer">
              <div class="pull-left">
                <a href="#" class="btn btn-default btn-flat">@lang('layout_admin.header.profile')</a>
              </div>
              <div class="pull-right">
                <a href="#" class="btn btn-default btn-flat">@lang('layout_admin.header.sign_out')</a>
              </div>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
</header>
