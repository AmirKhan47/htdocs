@extends('layouts.admin')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Businesses</h1>
                    </div>
                    <div class="col-sm-6">
                        {{-- <button class="btn btn-primary float-right" data-toggle="modal" data-target="#add">Add Businesses</button> --}}
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
                                <h3 class="card-title">Monthly Report</h3>
                            </div>
                            <div class="container my-2">
                                <div class="row font-weight-bold border">
                                    <div class="col">Business Name: {{ $header->name }}</div>
                                    <div class="col">Category: {{ $header->category }}</div>
                                    <div class="col">Type: {{ $header->type }}</div>
                                </div>
                            </div>
                            <form id="monthly_search" action="/header/monthlyreport/{{ $header->id }}/{{ $header->category }}" method="post" class="form-horizontal mt-0">
                                @csrf
                                <div class="container">
                                    <div class="row">
                                        
                                        <div class="offset-3 col-1">
                                            <label for="">Year</label>
                                        </div>
                                        <div class="col-2">
                                            <select onchange="$('#button').click()" class="form-control form-control-sm" name="year" id="">
                                                @for ($i = date('Y') ; $i > 1950; $i--)
                                                    <option value="{{ $i }}" @if ($i == $year) selected="selected" @endif>{{ $i }}</option>";
                                                @endfor
                                            </select>
                                        </div>
                                        <div class="col">
                                            <button class="btn btn-primary btn-sm" type="submit" id="button" value="submit" name="submit" style="display: none;">
                                                Search
                                            </button>
                                            {{-- <button id="cmd">generate PDF</button> --}}
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <div class="card-body mt-0 pt-0">
                                <div class="table-responsive">
                                    <table id="hospital_daily_report" class="table table-sm table-bordered table-hover">
                                        @if ($header->category=='Stock')
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Day</th>
                                                <th>Stock Value</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $count=1;
                                                    // $total = 0;
                                                @endphp
                                                @foreach ($data as $row)
                                                <tr>
                                                    <td>{{ $count++ }}</td>
                                                    <td>{{ $row->created_at }}</td>
                                                    <td>{{ $row->stock }}</td>
                                                </tr>
                                                @endforeach
                                                <tfoot class="font-weight-bold">
                                                    <b><tr>
                                                        <td></td>
                                                        <td>Total:</td>
                                                        <td>{{ $data->sum('stock') }}</td>
                                                    </tr></b>
                                                </tfoot>
                                            </tbody>
                                        @else
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Day</th>
                                                    <th>Expense</th>
                                                    <th>Income</th>
                                                    <th>Naam</th>
                                                    <th>Jama</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $count=1;
                                                    // $total = 0;
                                                @endphp
                                                @foreach ($data as $row)
                                                <tr>
                                                    <td>{{ $count++ }}</td>
                                                    <td>{{ $row->created_at }}</td>
                                                    <td>{{ $row->expense }}</td>
                                                    <td>{{ $row->income }}</td>
                                                    <td>{{ $row->naam }}</td>
                                                    <td>{{ $row->jama }}</td>
                                                </tr>
                                                @endforeach
                                                <tfoot class="font-weight-bold">
                                                    <b><tr>
                                                        <td></td>
                                                        <td>Total:</td>
                                                        <td>{{ $data->sum('expense') }}</td>
                                                        <td>{{ $data->sum('income') }}</td>
                                                        <td>{{ $data->sum('naam') }}</td>
                                                        <td>{{ $data->sum('jama') }}</td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr></b>
                                                </tfoot>
                                            </tbody>
                                        @endif
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
