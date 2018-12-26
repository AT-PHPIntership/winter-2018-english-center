@extends('backend.layouts.master')

@section('title', 'HOME')

@section('content')

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Data Table With Full Features</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                              <th width="50px">ID</th>
                              <th>Title</th>
                              <th>Sub Course</th>
                              <th width="50px">Count View</th>
                              <th width="50px">Total Rating</th>
                              <th>Average</th>
                              <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($courses as $key => $course)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $course->title }}</td>
                                <td>
                                    @if($course['parent_id'] == 0)
                                    {{ 'none' }}
                                    @else
                                        @php
                                            $parent = DB::table('courses')->where('id', $course['parent_id'])->first();
                                            echo $parent->title;
                                        @endphp
                                    @endif
                                </td>
                                <td>{{ $course->count_view }}</td>
                                <td>{{ $course->total_rating }}</td>
                                <td>{{ $course->average }}</td>
                                <td>
                                    <a href="#" class="btn btn-warning">Edit</a>
                                    <button type="button" class="btn btn-danger form-delete btn-delete-item">   Delete
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Rendering engine</th>
                                <th>Browser</th>
                                <th>Platform(s)</th>
                                <th>Engine version</th>
                                <th>CSS grade</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
@endsection
