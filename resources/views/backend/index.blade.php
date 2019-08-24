@extends('backend.layouts.master')

@section('title', 'HOME')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    @lang('layout_admin.dashboard')
    <small>@lang('layout_admin.control_panel')</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> @lang('layout_admin.home')</a></li>
    <li class="active"> @lang('layout_admin.dashboard')</li>
  </ol>
</section>
<!-- Main content -->
<section class="content">
  <!-- Info boxes -->
  <div class="row">

    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">{{ __('dashboard.members') }}</span>
          <span class="info-box-number">{{ $statisticals['totalUsers'] }}</span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->

    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-aqua"><i class="fa fa-calendar"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">{{ __('dashboard.total_course') }}</span>
          <span class="info-box-number">{{ $statisticals['totalCourses'] }}</span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-green"><i class="ion ion-ios-book-outline"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">{{ __('dashboard.total_lesson') }}</span>
          <span class="info-box-number">{{ $statisticals['totalLessons'] }}</span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>

    <!-- /.col -->
    <!-- fix for small devices only -->
    {{-- <div class="clearfix visible-sm-block"></div> --}}

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-star-o"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">{{ __('dashboard.like') }}</span>
              <span class="info-box-number">{{ $statisticals['avgRating']}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->

  <!-- Main row -->
  <div class="row">
    <!-- Left col -->
    {{-- <div class="col-md-7">
       <div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title">{{ __('dashboard.count_user') }}</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
          <div class="chart">
            <canvas id="barChart" style="height: 229px; width: 479px;" width="479" height="229"></canvas>
          </div>
        </div>
        <!-- /.box-body -->
      </div>
    </div> --}}
    <!-- /.col -->

    <div class="col-md-6">

      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">{{ __('dashboard.popular_courses') }}</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col-md-7">
              <div class="chart-responsive">
                <canvas id="pieChart" height="155" width="192"></canvas>
              </div>
              <!-- ./chart-responsive -->
            </div>
            <!-- /.col -->
            <div class="col-md-5">
              <ul class="chart-legend clearfix">

                <li><i class="fa fa-circle-o text-red"></i> {{ $statisticals['maxCourseUser'][0]->name }}</li>
                <li><i class="fa fa-circle-o text-green"></i> {{ $statisticals['maxCourseUser'][1]->name }}</li>
                <li><i class="fa fa-circle-o text-yellow"></i> {{ $statisticals['maxCourseUser'][2]->name }}</li>
              </ul>
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
      </div>
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>
<!-- /.content -->
<div class="control-sidebar-bg"></div>

<script type="text/javascript">
    var course1 = {!! json_encode($statisticals['maxCourseUser'][0]) !!};
    var course2 = {!! json_encode($statisticals['maxCourseUser'][1]) !!};
    var course3 = {!! json_encode($statisticals['maxCourseUser'][2]) !!};
</script>
@endsection
