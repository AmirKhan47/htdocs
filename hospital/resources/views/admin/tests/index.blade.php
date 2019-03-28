@extends('layouts.admin')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Tests</h1>
                    </div>
                    <div class="col-sm-6">
                        <button class="btn btn-primary float-right" data-toggle="modal" data-target="#add">Add Tests</button>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">@include('includes/admin/messages')</div>
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Manage Tests</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="tests" class="table table-sm table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Rate</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $count=1 @endphp
                                            @foreach ($tests as $test)
                                            <tr>
                                                <td>{{ $count++ }}</td>
                                                <td>{{ $test->name }}</td>
                                                <td>{{ $test->rate }}</td>
                                                @if ($test->status==1)
                                                    <td>Active</td>
                                                @else
                                                    <td>Inactive</td>
                                                @endif
                                                <td>
                                                    {{-- <button class="btn btn-primary btn-sm" onclick="header_detail({{$test->id}})">
                                                        Detail
                                                    </button> --}}

                                                    {{-- <form action="{{ route('test.edit', $test->id)}}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-danger" type="submit">Delete</button>
                                                    </form> --}}

                                                    <a class="btn btn-primary btn-sm" href="{{ route('test.edit', $test->id) }}">
                                                        Edit
                                                    </a>
                                                    {{-- <a class="btn btn-primary btn-sm" href="/test/monthlyreport/{{ $test->id }}/{{ $test->category }}">
                                                        Monthly Report
                                                    </a> --}}
                                                    {{-- <a class="btn btn-danger" href="/admin/delete_test/{{ $test->admin_id }}">Delete</a> --}}
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection
