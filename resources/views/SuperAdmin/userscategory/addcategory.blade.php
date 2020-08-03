@extends('layouts/app')

@section('content')


<div class="card">
    <div class="card-body register-card-body">
        <p class="login-box-msg">ADD Users category</p>
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

        <form action="{{ url('superadmin/add/users/storecategory') }}" method="post">
            @csrf
            <div class="input-group mb-3">
                <input type="text" class="form-control" name="name" placeholder="Enter Users Category">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-user"></span>
                    </div>
                </div>
            </div>
            <!-- /.col -->
            <div class="col-12">
                <button type="submit" class="btn btn-primary btn-block my-3">Add category</button>
                <a href="{{ URL::to('superadmin/add/users/categories') }}" class="btn btn-info btn-block">View Categories</a>
            </div>

        </form>


        @endsection
