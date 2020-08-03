@extends('layouts/app')

@section('content')
<h1>Courier</h1>
  <a class="btn btn-primary btn-lg" href="{{ route('AddCategoryAdmin') }}">Add users category</a>
    <a class="btn btn-primary btn-lg" href="{{ route('SuperAdminRegister') }}">Admin User registration</a>
    <a class="btn btn-primary btn-lg" href="{{ route('userRegistration') }}">Normal User registration</a>
    <a class="btn btn-primary btn-lg" href="{{ route('userloginpage') }}">Normal User Login</a>

@endsection
