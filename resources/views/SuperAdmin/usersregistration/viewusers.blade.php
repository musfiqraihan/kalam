@extends('layouts/app')

@section('content')
  <div class="container">


      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <h2>Register Users List</h2>
            <table class="table table-responsive">
              <tr>
                <th>SL</th>
                <th>Category name</th>
                <th>User name</th>
                <th>User Email</th>
                <th>Mobile</th>
                <th>Address</th>
                <th>Image</th>
                <th>Action</th>
              </tr>
              @foreach ($usersregistration as $row)
                <tr>
                  <td>{{ $row->id }}</td>
                  <td>{{ $row->name }}</td>
                  <td>{{ $row->username }}</td>
                  <td>{{ $row->email}}</td>
                  <td>{{ $row->mobile_number }}</td>
                  <td>{{ $row->address }}</td>
                  <td><img src="{{ URL::to($row->userimage) }}" style="width:90px; height:60px;"></td>
                  <td>
                    <a href="{{ URL::to('superadmin/users/registration/editusers/'.$row->id) }}" class="btn btn-info">Edit</a>
                    <a href="{{ URL::to('superadmin/users/registration/deleteusers/'.$row->id) }}" class="btn  btn-danger">Delete</a>
                  </td>
                </tr>
              @endforeach

            </table>



<a href="{{ URL::to('superadmin/users/registration') }}" class="btn btn-info">ADD Users</a>
             </div>
           </div>
@endsection
