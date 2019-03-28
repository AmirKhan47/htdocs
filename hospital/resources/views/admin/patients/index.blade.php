@extends('layouts.admin')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Patients</h1>
                    </div>
                    <div class="col-sm-6">
                        <a href="{{ route('patient.create') }}"><button class="btn btn-primary float-right">Add Patients</button></a>
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
                                <h3 class="card-title">Manage Patients</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="patients" class="table table-sm table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Patient ID</th>
                                                <th>Patient Name</th>
                                                <th>Welfare</th>
                                                <th>Discount</th>
                                                <th>Total Amount</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $count=1 @endphp
                                            @foreach ($patients as $patient)
                                            <tr>
                                                <td>{{ $count++ }}</td>
                                                <td>{{ $patient->id }}</td>
                                                <td>{{ $patient->name }}</td>
                                                <td>{{ $patient->welfare }}</td>
                                                <td>{{ $patient->discount }}</td>
                                                <td>{{ $patient->final_total }}</td>
                                                <td>
                                                    {{-- <button class="btn btn-primary btn-sm" onclick="header_detail({{$patient->id}})">
                                                        Detail
                                                    </button> --}}

                                                    {{-- <form action="{{ route('patient.edit', $patient->id)}}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-danger" type="submit">Delete</button>
                                                    </form> --}}
                                                    {{-- <a class="btn btn-primary btn-sm" href="{{ route('patient.show', $patient->id) }}">
                                                        Bill
                                                    </a> --}}
                                                    <a class="btn btn-primary btn-sm" href="{{ route('patient.edit', $patient->id) }}">
                                                        Edit
                                                    </a>
                                                    {{-- <a class="btn btn-primary btn-sm" href="/patient/monthlyreport/{{ $patient->id }}/{{ $patient->category }}">
                                                        Monthly Report
                                                    </a> --}}
                                                    {{-- <a class="btn btn-danger" href="/admin/delete_patient/{{ $patient->admin_id }}">Delete</a> --}}
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
