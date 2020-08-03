@extends('layouts/app')

@section('content')

  <div class="container">


      <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 ml-auto">

            <table class="table table-responsive">
              <tr>
                <th>SL</th>
                <th>Category name</th>
                <th>Action</th>
              </tr>
              @foreach ($userscategories as $row)
                <tr>
                  <td>{{ $row->id }}</td>
                  <td>{{ $row->name }}</td>
                  <td>
                    <a href="{{ URL::to('superadmin/add/users/editcategory/'.$row->id) }}" class="btn btn-info">Edit</a>
                    <a href="{{ URL::to('superadmin/add/users/deletecategory/'.$row->id) }}" class="btn  btn-danger">Delete</a>
                  </td>
                </tr>
              @endforeach

            </table>



<a href="{{ URL::to('superadmin/add/users/addcategory') }}" class="btn btn-info">ADD Category</a>
             </div>
           </div>

@endsection
