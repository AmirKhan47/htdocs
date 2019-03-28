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
                                <h3 class="card-title">Daily Report</h3>
                            </div>
                            <div class="container my-2">
                                <div class="row font-weight-bold border">
                                    <div class="col">Business Name: {{ $header->name }}</div>
                                    <div class="col">Category: {{ $header->category }}</div>
                                    <div class="col">Type: {{ $header->type }}</div>
                                </div>
                            </div>
                            <form id="daily_search" action="/header/dailyreport/{{ $header->id }}/{{ $header->category }}" method="post" class="form-horizontal mt-0">
                                @csrf
                                <div class="container">
                                    <div class="row">
                                        <div class="offset-2 col-1">
                                            <label for="">Month</label>
                                        </div>
                                        <div class="col-2">
                                            <select onchange="$('#button').click()" class="form-control form-control-sm" name="month" id="" required="required">
                                                {{-- <option value="" selected="selected">{{ date('M') }}</option> --}}
                                                <option value="01" @if (1 == $month) selected="selected" @endif>January</option>
                                                <option value="02" @if (2 == $month) selected="selected" @endif>February</option>
                                                <option value="03" @if (3 == $month) selected="selected" @endif>March</option>
                                                <option value="04" @if (4 == $month) selected="selected" @endif>April</option>
                                                <option value="05" @if (5 == $month) selected="selected" @endif>May</option>
                                                <option value="06" @if (6 == $month) selected="selected" @endif>June</option>
                                                <option value="07" @if (7 == $month) selected="selected" @endif>July</option>
                                                <option value="08" @if (8 == $month) selected="selected" @endif>August</option>
                                                <option value="09" @if (9 == $month) selected="selected" @endif>September</option>
                                                <option value="10" @if (10 == $month) selected="selected" @endif>October</option>
                                                <option value="11" @if (11 == $month) selected="selected" @endif>November</option>
                                                <option value="12" @if (12 == $month) selected="selected" @endif>December</option>
                                            </select>
                                        </div>
                                        
                                        <div class="col-1">
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
