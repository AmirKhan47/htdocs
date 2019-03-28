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
                                <h3 class="card-title">Add Doctors</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form role="form" id="doctor_form" class="form-horizontal" action="{{ route('doctor.store') }}" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="form-row">
                                        <div class="col">
                                            <label for="">Name</label>
                                            <input type="text" name="name" id="" pattern="^[a-zA-Z ]{3,40}$" maxlength="50" value="{{ old('name') }}" class="form-control" placeholder="" required="required">
                                        </div>
                                        <div class="col">
                                            <label for="">Address</label>
                                            <input type="text" name="address" id="" maxlength="500" value="{{ old('address') }}" class="form-control" placeholder="" required="required">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col">
                                            <label for="">Designation</label>
                                            <input type="text" name="designation" id="" maxlength="100" value="{{ old('designation') }}" class="form-control" placeholder="" required="required">
                                        </div>
                                        <div class="col">
                                            <label for="">Commission % check up</label>
                                            <input type="text" name="checkup_commission" id="" maxlength="50" value="{{ old('checkup_commission') }}" class="form-control" placeholder="" required="required">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col">
                                            <label for="">Email</label>
                                            <input type="email" name="email" id="" pattern="^[^.]([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$"maxlength="100" value="{{ old('email') }}" class="form-control" placeholder="" required="required">
                                        </div>
                                        <div class="col">
                                            <label for="">Doctor Fee</label>
                                            <input type="text" name="fee" id="" pattern="^(0|[1-9][0-9]*)$" maxlength="50" value="{{ old('fee') }}" class="form-control" placeholder="" required="required">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col">
                                            <label for="">Type</label>
                                            <select class="form-control" name="type" id="" required="required">
                                                <option value="">Select</option>
                                                <option value="Hired" @if (old('type') == 'Hired') selected='selected' @endif >Hired</option>
                                                <option value="Visiting" @if (old('type') == 'Visiting') selected='selected' @endif >Visiting</option>
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
                                    <div class="form-row">
                                        <div class="col">
                                            <label for="">Contact No</label>
                                            <input type="text" name="contact" id="" pattern="[0-9]{11,12}" maxlength="12" value="{{ old('contact') }}" class="form-control" placeholder="" required="required">
                                        </div>
                                        <div class="col">
                                            <label for="">Category</label>
                                            <br>
                                            <div class="form-control border">
                                                <div class="form control form-check form-check-inline">
                                                    <input class="form-check-input category_checkbox" type="checkbox" name="category[]" id="" value="OPD">
                                                    <label class="form-check-label" for="">OPD</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input category_checkbox" type="checkbox" name="category[]" id="" value="Surgeon">
                                                    <label class="form-check-label" for="">Surgeon</label>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="offset-1 col-10 container table-bordered offset-1" style=" border-width:3px !important;">
                                    <div class="row my-1">
                                        <div class="col-1">
                                            <label for="">Test</label>
                                        </div>
                                        <div class="col-2">
                                            <select class="form-control form-control-sm" name="test_id" id="test_id" required="required">
                                                <option value="">Select</option>
                                                @foreach ($tests as $test)
                                                    <option value="{{ $test->id }}">{{ $test->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="offset-1 col-3">
                                            <label for="">Comission % Per Test</label>
                                        </div>
                                        <div class="col-1">
                                            <input type="text" name="test_commission" id="test_commission" required="required">
                                        </div>
                                        <div class="offset-2 col-2">
                                            <button class="btn btn-primary btn-sm" type="button" id="test_commission_add" name="test_commission_add">
                                                Add
                                            </button>
                                            <button type="button" id="delete_test_commission" class="btn btn-danger btn-sm">Delete</button>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table id="myTable" class="table table-sm table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Test Name</th>
                                                    <th>Doctor Percentage</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="card-footer">
                                    <div class="offset-5">
                                    <input type="submit" name="add_doctor_form_submit" id="add_doctor_form_submit" class="btn btn-primary" value="Submit" class="btn btn-primary">
                                </div>
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
