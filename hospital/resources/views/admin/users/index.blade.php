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
                    <div class="col-sm-6">
                        <a class="btn btn-primary float-right" href="/user/create">Add Users</a>
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
                                <h3 class="card-title">Manage Users</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form id="daily_search" action="/user/get_users" method="post" class="form-horizontal mt-2">
                                @csrf
                                <div class="container">
                                    <div class="row">
                                        <div class="offset-2 col-1">
                                            <label for="">Role</label>
                                        </div>
                                        <div class="col-2">
                                            <select onchange="$('#button').click()" class="form-control form-control-sm" name="role" id="" required="required">
                                                <option value="">Select</option>
                                                <option value="2">CO</option>
                                                <option value="3">OTO</option>
                                            </select>
                                        </div>
                                        <div class="col">
                                            <button class="btn btn-primary btn-sm" type="submit" id="button" value="submit" name="submit" style="display: none;">
                                                Search
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="card-body mt-0 pt-0">
                                <div class="table-responsive">
                                    <table id="users" class="table table-sm table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Username</th>
                                                <th>Role</th>
                                                <th>Created Date</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $count=1 @endphp
                                            @foreach ($users as $user)
                                            <tr>
                                                <td>{{ $count++ }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->username }}</td>
                                                @if ($user->role==2) <td>CO</td> @else <td>OTO</td> @endif
                                                <td>{{ $user->created_at }}</td>
                                                @if ($user->status==1) <td>Active</td> @else <td>Inactive</td> @endif
                                                <td>
                                                    <a class="btn btn-info" href="/user/{{ $user->id }}/edit">Edit</a>
                                                    {{-- <a class="btn btn-danger" href="/admin/delete_user/{{ $user->admin_id }}">Delete</a> --}}
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
