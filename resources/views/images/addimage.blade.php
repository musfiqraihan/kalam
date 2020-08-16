<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>For My Friend</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>

<body>
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
    <div class="container">
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        <div class="row py-5">
            <form action="{{ route('store.image') }}" method="post" enctype="multipart/form-data">
                @csrf

                <label style="margin-bottom:10px;" for="">Enter name</label>&nbsp;&nbsp;
                <input style="margin-bottom:10px;" type="text" name="name"><br>

                {{-- Father Image Form --}}
                <label style="margin-bottom:10px;" for="">Add Image 1</label>&nbsp;&nbsp;
                <input style="margin-bottom:10px;" type="file" name="image1"><br>

                {{-- My Image Form --}}
                <label style="margin-bottom:10px;" for="">Add Image 2</label>&nbsp;&nbsp;
                <input style="margin-bottom:10px;" type="file" name="image2"><br>

                {{-- My Image Form --}}
                <label style="margin-bottom:10px;" for="">Add Image 3</label>&nbsp;&nbsp;
                <input style="margin-bottom:10px;" type="file" name="image3"><br>

                {{-- My Image Form --}}
                <label style="margin-bottom:10px;" for="">Add Image 4</label>&nbsp;&nbsp;
                <input style="margin-bottom:10px;" type="file" name="image4"><br>

                {{-- My Image Form --}}
                <label style="margin-bottom:10px;" for="">Add Image 5</label>&nbsp;&nbsp;
                <input style="margin-bottom:10px;" type="file" name="image5"><br>

                <button type="submit" class="btn btn-success">SUBMIT</button>
                <a href="{{ url('/') }}" class="btn btn-danger">Cancel</a>
            </form>


        </div>

    </div>









    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>
