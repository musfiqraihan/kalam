@extends('layouts/app')

@section('content')


<div class="card">
    <div class="card-body register-card-body">
        <p class="login-box-msg">Edit Users category</p>
        <!-- Error message -->
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <!--  message -->

        <form action="{{ url('superadmin/add/users/updatecategory/'.$userscategories->id) }}" method="post">
            @csrf
            <div class="input-group mb-3">
                <input type="text" class="form-control" name="name" value="{{ $userscategories->name }}">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-user"></span>
                    </div>
                </div>
            </div>
            <!-- /.col -->
            <div class="col-12">
                <button type="submit" class="btn btn-primary btn-block my-3">Update category</button>
                <a href="{{ URL::to('superadmin/add/users/categories') }}" class="btn btn-danger btn-block">Cancel</a>
            </div>

        </form>


        @endsection
