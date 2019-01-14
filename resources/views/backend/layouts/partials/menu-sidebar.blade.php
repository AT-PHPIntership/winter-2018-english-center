  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="bower_components/admin-lte/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Alexander Pierce</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
            <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
            </button>
          </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">@lang('layout_admin.sidebar.main_navigation')</li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>@lang('layout_admin.dashboard')</span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>@lang('layout_admin.sidebar.user_management')</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('admin.users.index')}}"><i class="fa fa-circle-o"></i> @lang('layout_admin.sidebar.show_user')</a></li>
            <li><a href="{{route('admin.users.create')}}"><i class="fa fa-circle-o"></i> @lang('layout_admin.sidebar.add_user')</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>@lang('layout_admin.sidebar.course_management')</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('admin.courses.index') }}"><i class="fa fa-circle-o"></i> @lang('layout_admin.sidebar.show_course')</a></li>
            <li><a href="{{ route('admin.courses.create') }}"><i class="fa fa-circle-o"></i> @lang('layout_admin.sidebar.add_course')</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="{{ route('admin.levels.index') }}">
            <i class="fa fa-table"></i> <span>@lang('layout_admin.sidebar.level_management')</span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-folder"></i> <span>@lang('layout_admin.sidebar.lesson_management')</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="../examples/invoice.html"><i class="fa fa-circle-o"></i> @lang('layout_admin.sidebar.show_lesson')</a></li>
            <li><a href="../examples/profile.html"><i class="fa fa-circle-o"></i> @lang('layout_admin.sidebar.add_lesson')</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-share"></i> <span>@lang('layout_admin.sidebar.vocabularies_management')</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('admin.vocabularies.index') }}"><i class="fa fa-circle-o"></i> @lang('layout_admin.sidebar.show_vocabularies')</a></li>
            <li><a href="{{ route('admin.vocabularies.create') }}"><i class="fa fa-circle-o"></i> @lang('layout_admin.sidebar.add_vocabularies')</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-file"></i> <span>@lang('layout_admin.sidebar.text_management')</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i> @lang('layout_admin.sidebar.show_text')</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> @lang('layout_admin.sidebar.add_text')</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>@lang('layout_admin.sidebar.exercise_management')</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="../forms/general.html"><i class="fa fa-circle-o"></i> @lang('layout_admin.sidebar.show_exercise')</a></li>
            <li><a href="../forms/advanced.html"><i class="fa fa-circle-o"></i> @lang('layout_admin.sidebar.add_exercise')</a></li>
          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
