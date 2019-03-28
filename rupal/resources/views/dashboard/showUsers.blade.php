@extends('layouts/dashboard')
@section('title', 'Users')
@section('content')

    <section class="py-3">
        <div class="card card-info elevation-2">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h3 class="card-title">All Users</h3>
                    </div>
                    <div class="col-md-6">
                        <a href="/users/create" class="btn btn-dark float-right btn-sm">Create User</a>
                    </div>
                </div>
                
                
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="users_dataTable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <td>Username</td>
                            <td>User Email</td>
                            <td>User Created by</td>
                            <td>User Created at</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td> @if ($user->user['name'] == "")
                                    System
                                    @endif
                                    {{$user->user['name']}}</td>
                                <td>{{$user->created_at}}</td>
                                
                            </tr>
                        @endforeach
                        
                    </tbody>
                </table>
            </div>
        </div>
    </section>

@endsection