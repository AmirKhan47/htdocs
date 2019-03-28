@extends('layouts/dashboard')
@section('content')

<h1 class="text-center py-2">Create User</h1>
    <div class="row mx-auto">
        <div class="col-md-6 offset-md-3 border shadow-sm p-5" style="background: white;">
            <form action="UsersController@store" method="POST">
                <div class="form-group">
                    <label for="">Username</label>
                    <input class="form-control" type="text" name="user_username" required>
                </div>
    
                <div class="form-group">
                    <label for="">Password</label>
                    <input class="form-control" type="password" name="user_password">
                </div>

                <div class="form-group">
                    <label for="">Password</label>
                    <select class="form-control" name="user_role" id="user_role">
                        <option value="">Select Role</option>
                        <option value="Editor">Editor</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Email</label>
                    <input class="form-control" type="email" name="user_email">
                </div>
    
                

                <input type="submit" class="btn btn-dark" value="Add User">
            </form>
        </div>
    </div>
        
        
    
@endsection