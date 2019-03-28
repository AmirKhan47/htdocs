@extends('layouts.admin')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Doctors</h1>
                    </div>
                    <div class="col-sm-6">
                        <button class="btn btn-primary float-right" data-toggle="modal" data-target="#add">Add Doctors</button>
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
                                <h3 class="card-title">Manage Doctors</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="doctors" class="table table-sm table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Contact</th>
                                                <th>Comission %</th>
                                                <th>Category</th>
                                                <th>Fee</th>
                                                <th>Address</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $count=1 @endphp
                                            @foreach ($doctors as $doctor)
                                            <tr>
                                                <td>{{ $count++ }}</td>
                                                <td>{{ $doctor->name }}</td>
                                                <td>{{ $doctor->contact }}</td>
                                                <td>{{ $doctor->checkup_commission }}</td>
                                                <td>{{ $doctor->category }}</td>
                                                <td>{{ $doctor->fee }}</td>
                                                <td>{{ $doctor->address }}</td>
                                                @if ($doctor->status==1)
                                                    <td>Active</td>
                                                @else
                                                    <td>Inactive</td>
                                                @endif
                                                <td>
                                                    {{-- <button class="btn btn-primary btn-sm" onclick="header_detail({{$doctor->id}})">
                                                        Detail
                                                    </button> --}}

                                                    {{-- <form action="{{ route('doctor.edit', $doctor->id)}}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-danger" type="submit">Delete</button>
                                                    </form> --}}

                                                    <a class="btn btn-primary btn-sm" href="{{ route('doctor.edit', $doctor->id) }}">
                                                        Edit
                                                    </a>
                                                    {{-- <a class="btn btn-primary btn-sm" href="/doctor/monthlyreport/{{ $doctor->id }}/{{ $doctor->category }}">
                                                        Monthly Report
                                                    </a> --}}
                                                    {{-- <a class="btn btn-danger" href="/admin/delete_doctor/{{ $doctor->admin_id }}">Delete</a> --}}
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
