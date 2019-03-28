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
                        <button class="btn btn-primary float-right" data-toggle="modal" data-target="#add">Add Businesses</button>
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
                                <h3 class="card-title">Manage Businesses</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="headers" class="table table-sm table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Category</th>
                                                <th>Type</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $count=1 @endphp
                                            @foreach ($headers as $header)
                                            <tr>
                                                <td>{{ $count++ }}</td>
                                                <td>{{ $header->name }}</td>
                                                <td>{{ $header->category }}</td>
                                                <td>{{ $header->type }}</td>
                                                @if ($header->status==1)
                                                    <td>Active</td>
                                                @else
                                                    <td>Inactive</td>
                                                @endif
                                                <td>
                                                    <button class="btn btn-primary btn-sm" onclick="header_detail({{$header->id}})">
                                                        Detail
                                                    </button>

                                                    {{-- <form action="{{ route('header.edit', $header->id)}}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-danger" type="submit">Delete</button>
                                                    </form> --}}

                                                    <a class="btn btn-primary btn-sm" href="/header/dailyreport/{{ $header->id }}/{{ $header->category }}">
                                                        Daily Report
                                                    </a>
                                                    <a class="btn btn-primary btn-sm" href="/header/monthlyreport/{{ $header->id }}/{{ $header->category }}">
                                                        Monthly Report
                                                    </a>
                                                    {{-- <a class="btn btn-danger" href="/admin/delete_header/{{ $header->admin_id }}">Delete</a> --}}
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

    <!-- Add Header Modal -->
    <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title" id="exampleModalLabel">Add Businesses</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form role="form" id="add_header_form" class="form-horizontal" action="{{ route('header.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="col">
                                <label for="">Name</label>
                                <input type="text" name="name" id="" value="" class="form-control" placeholder="" pattern="^[a-zA-Z ]{3,40}$" maxlength="50" required="required">
                            </div>
                            <div class="col">
                                <label for="">Urdu Name</label>
                                <input type="text" name="urdu_name" id="" value="" class="form-control" placeholder="" pattern="^[a-zA-Z ]{3,40}$" maxlength="50" required="required">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <label for="">Category</label>
                                <select class="form-control" name="category" id="" required="required">
                                    <option value="">Select</option>
                                    <option value="Hospital">Hospital</option>
                                    <option value="Other Business">Other Business</option>
                                    <option value="Stock">Stock</option>
                                </select>
                            </div>
                            <div class="col">
                                <label for="">Type</label>
                                <select class="form-control" name="type" id="" required="required">
                                    <option value="None">None</option>
                                    <option value="Expense/Naam">Expense/Naam</option>
                                    <option value="Income/Jama">Income/Jama</option>
                                    <option value="Expense/Naam Income/Jama">Expense/Naam Income/Jama</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <label for="">Status</label>
                                <select class="form-control" name="status" id="" required="required">
                                    <option value="">Select</option>
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                            <div class="col">
                            </div>
                        </div>
                        <input type="submit" id="add_header_hidden_submit" style="display: none">
                    </form>
                </div>
                <div class="modal_alert" id="alert"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary close_header_btn" data-dismiss="modal">Close</button>
                    <button type="button" name="submit" id="add_header_btn" class="btn btn-primary">
                        Submit
                    </button>
                </div>
            </div>
        </div>
    </div>

    {{-- ////////////////////////////////Header Detail Modals//////////////////////////////////////////////// --}}

    <!-- Add Hospital Modal -->
    <div class="modal fade" id="hospital_detail_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title" id="exampleModalLabel">Add Hospital Detail</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form role="form" id="hospital_detail_form" class="form-horizontal" action="{{ route('header.store') }}" method="POST">
                        @csrf
                        <input type="hidden" class="header_id" name="header_id" id="id" value="">
                        <p>Current Date: {{ now()->format('d-m-y') }}</p>
                        <div class="row">
                            <div class="col">
                               <small> Bussiness Header : <b><span class="name" id="name"></span></b></small>
                            </div>
                            <div class="col">
                               <small> Category : <b><span class="category" id="category"></span></b></small>
                            </div>
                            <div class="col">
                               <small>Type : <b><span class="type" id="type"></span></b></small>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <label for="">Expense</label>
                                <input type="text" name="expense" id="" value="" class="form-control" placeholder="" pattern="^(0|[1-9][0-9]*)$" maxlength="50" required="required">
                            </div>
                            <div class="col">
                                <label for="">Naam</label>
                                <input type="text" name="naam" id="" value="" class="form-control" placeholder="" pattern="^(0|[1-9][0-9]*)$" maxlength="50" required="required">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <label for="">Status</label>
                                <select class="form-control" name="status" id="" required="required">
                                    <option value="">Select</option>
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                            <div class="col">
                            </div>
                        </div>
                        <input type="submit" id="hospital_detail_hidden_submit" style="display: none">
                    </form>
                </div>
                <div class="modal_alert" id="alert"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary close_header_btn" data-dismiss="modal">Close</button>
                    <button type="button" name="submit" id="hospital_detail_btn" class="btn btn-primary">
                        Submit
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Other Businesses Modal -->
    <div class="modal fade" id="other_bussiness_detail_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title" id="exampleModalLabel">Add Other Business Detail</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form role="form" id="other_bussiness_detail_form" class="form-horizontal" action="{{ route('header.store') }}" method="POST">
                        @csrf
                        <input type="hidden" class="header_id" name="header_id" id="id" value="">
                        <p>Current Date: {{ now()->format('d-m-y') }}</p>
                        <div class="row">
                            <div class="col">
                               <small> Bussiness Header : <b><span class="name" id="name"></span></b></small>
                            </div>
                            <div class="col">
                               <small> Category : <b><span class="category" id="category"></span></b></small>
                            </div>
                            <div class="col">
                               <small>Type : <b><span class="type" id="type"></span></b></small>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <label for="">Expense</label>
                                <input type="text" name="expense" id="" value="" class="form-control" placeholder="" pattern="^(0|[1-9][0-9]*)$" maxlength="50" required="required">
                            </div>
                            <div class="col">
                                <label for="">Naam</label>
                                <input type="text" name="naam" id="" value="" class="form-control" placeholder="" pattern="^(0|[1-9][0-9]*)$" maxlength="50" required="required">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <label for="">Income</label>
                                <input type="text" name="income" id="" value="" class="form-control" placeholder="" pattern="^(0|[1-9][0-9]*)$" maxlength="50" required="required">
                            </div>
                            <div class="col">
                                <label for="">Jama</label>
                                <input type="text" name="jama" id="" value="" class="form-control" placeholder="" pattern="^(0|[1-9][0-9]*)$" maxlength="50" required="required">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <label for="">Status</label>
                                <select class="form-control" name="status" id="" required="required">
                                    <option value="">Select</option>
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                            <div class="col">
                            </div>
                        </div>
                        <input type="submit" id="other_bussiness_detail_hidden_submit" style="display: none">
                    </form>
                </div>
                <div class="modal_alert" id="alert"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary close_header_btn" data-dismiss="modal">Close</button>
                    <button type="button" name="submit" id="other_bussiness_detail_btn" class="btn btn-primary">
                        Submit
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Stock Modal -->
    <div class="modal fade" id="stock_detail_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title" id="exampleModalLabel">Add Stock Detail</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form role="form" id="stock_detail_form" class="form-horizontal" action="{{ route('header.store') }}" method="POST">
                        @csrf
                        <input type="hidden" class="header_id" name="header_id" id="id" value="">
                        <p>Current Date: {{ now()->format('d-m-y') }}</p>
                        <div class="row">
                            <div class="col">
                               <small> Bussiness Header : <b><span class="name" id="name"></span></b></small>
                            </div>
                            <div class="col">
                               <small> Category : <b><span class="category" id="category"></span></b></small>
                            </div>
                            <div class="col">
                               <small>Type : <b><span class="type" id="type"></span></b></small>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <label for="">Stock</label>
                                <input type="text" name="stock" id="" value="" class="form-control" placeholder="" pattern="^(0|[1-9][0-9]*)$" maxlength="50" required="required">
                            </div>
                            <div class="col">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <label for="">Status</label>
                                <select class="form-control" name="status" id="" required="required">
                                    <option value="">Select</option>
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                            <div class="col">
                            </div>
                        </div>
                        <input type="submit" id="stock_detail_hidden_submit" style="display: none">
                    </form>
                </div>
                <div class="modal_alert" id="alert"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary close_header_btn" data-dismiss="modal">Close</button>
                    <button type="button" name="submit" id="stock_detail_btn" class="btn btn-primary">
                        Submit
                    </button>
                </div>
            </div>
        </div>
    </div>

@endsection
