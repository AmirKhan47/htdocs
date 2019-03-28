@extends('layouts.admin')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Users</h1>
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
                                <h3 class="card-title">Add Users</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form role="form" class="form-horizontal" action="{{ route('user.store') }}" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="form-row">
                                        <div class="col">
                                            <label for="">Name</label>
                                            <input type="text" name="name" id="" value="{{ old('name') }}" class="form-control" placeholder="" required="required">
                                        </div>
                                        <div class="col">
                                            <label for="">CNIC</label>
                                            <input type="text" name="cnic" id="" value="{{ old('cnic') }}" class="form-control" placeholder="" required="required">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col">
                                            <label for="">Contact</label>
                                            <input type="text" name="contact" id="" value="{{ old('contact') }}" class="form-control" placeholder="" required="required">
                                        </div>
                                        <div class="col">
                                            <label for="">Address</label>
                                            <input type="text" name="address" id="" value="{{ old('address') }}" class="form-control" placeholder="" required="required">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col">
                                            <label for="">Username</label>
                                            <input type="text" name="username" id="" value="{{ old('username') }}" class="form-control" placeholder="" required="required">
                                        </div>
                                        <div class="col">
                                            <label for="">Email</label>
                                            <input type="email" name="email" id="" value="{{ old('email') }}" class="form-control" placeholder="" required="required">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col">
                                            <label for="">Password</label>
                                            <input type="password" name="password" id="" value="{{ old('password') }}" class="form-control" placeholder="" required="required">
                                        </div>
                                        <div class="col">
                                            <label for="">Role</label>
                                            <select class="form-control" name="role" id="" required="required">
                                                <option value="{{ old('role') }}">Select</option>
                                                <option value="2">CO</option>
                                                <option value="3">OTO</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col">
                                            <label for="">Status</label>
                                            <select class="form-control" name="status" id="" required="required">
                                                <option value="">Select</option>
                                                <option value="1" @if (old('status') == '1') selected='selected' @endif>Active</option>
                                                <option value="0" @if (old('status') == '0') selected='selected' @endif>Inactive</option>
                                            </select>
                                        </div>
                                        <div class="col">
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
