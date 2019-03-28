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
                                <h3 class="card-title">Add Tests</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form role="form" class="form-horizontal" action="{{ route('test.store') }}" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="form-row">
                                        <div class="col">
                                            <label for="">Name</label>
                                            <input type="text" name="name" id="" pattern="^[a-zA-Z ]{3,40}$" maxlength="50" value="{{ old('name') }}" class="form-control" placeholder="" required="required">
                                        </div>
                                        <div class="col">
                                            <label for="">Rate</label>
                                            <input type="text" name="rate" id="" pattern="^(0|[1-9][0-9]*)$" maxlength="50" value="{{ old('rate') }}" class="form-control" placeholder="" required="required">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col">
                                            <label for="">Category</label>
                                            <select class="form-control" name="category" id="" required="required">
                                                <option value="">Select</option>
                                                <option value="Lab" @if (old('category') == 'Lab') selected='selected' @endif>Lab</option>
                                                <option value="Radiology" @if (old('category') == 'Radiology') selected='selected' @endif>Radiology</option>
                                                <option value="Sonology" @if (old('category') == 'Sonology') selected='selected' @endif>Sonology</option>
                                            </select>
                                        </div>
                                        <div class="col">
                                            <label for="">Status</label>
                                            <select class="form-control" name="status" id="" required="required">
                                                <option value="">Select</option>
                                                <option value="1" @if (old('status') == '1') selected='selected' @endif>Active</option>
                                                <option value="0" @if (old('status') == '0') selected='selected' @endif>Inactive</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                <input type="submit" name="submit2" value="Submit" class="btn btn-primary">
                                </div>
                            </form>
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
