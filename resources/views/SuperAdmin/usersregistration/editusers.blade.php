@extends('layouts/app')

@section('content')

<div class="container justufy-content-center">


<div>
    <div class="register-logo">
        <a href="" class="display-3" style="color:black;">Courier</a>
    </div>

    <div class="card">
        <div class="card-body register-card-body">
            <p class="login-box-msg">Edit Users</p>

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

            <form action="{{ url('superadmin/users/registration/updateusers/'.$usersregistration->id) }}" method="post" enctype="multipart/form-data">
              @csrf
                <div class="floating-label-form-group mb-3">
                    <label>Choose User Category</label>
                    <br>
                    <select class="form-control text-size" name="users_id">
                        <option>Select</option>
                        @foreach ($userscategories as $row)
                          <option value="{{ $row->id }}" <?php if($row->id == $usersregistration->users_id)  echo "selected" ?>>{{ $row->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="username" placeholder="Enter Name" value="{{ $usersregistration->username }}">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="email" class="form-control" name="email" placeholder="Enter Email" value="{{ $usersregistration->email }}">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="text" name="mobile_number" class="form-control" placeholder="Mobile Number" value="{{ $usersregistration->mobile_number }}">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-mobile-alt"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" name="password" placeholder="Enter Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" name="password_confirmation" placeholder="Retype password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-1">
                    <input type="text" class="form-control" name="address" placeholder="Place Address" value="{{ $usersregistration->address }}">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="far fa-address-card"></span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                          <label for="exampleInputFile"> Edit Brand Image</label> <small>(Maximum 5mb)</small>
                          <div class="input-group">
                            <div class="custom-file">
                              <input type="file" class="custom-file-input" name="userimage">
                              <label class="custom-file-label" for="exampleInputFile">Choose file</label>

                            </div>

                          </div>
                          <label for="exampleInputFile"> Previous Image: </label>
                            <img src="{{ URL::to($usersregistration->userimage) }}" style="height:120px; width:120px;" alt="">
                            <input type="hidden" name="old_photo" value="{{ $usersregistration->userimage }}">
                        </div>

                <!-- /.col -->
                <div class="col-12 mx-auto">
                    <button type="submit" class="btn btn-primary btn-block">Update</button>
                    <a href="{{ URL::to('superadmin/users/registration/users') }}" class="btn btn-danger btn-block">Cancel</a>
                </div>
                </div>
                <!-- /.col -->
        </div>
        </form>


    </div>
    <!-- /.form-box -->
</div><!-- /.card -->
</div>
</div>


@endsection
