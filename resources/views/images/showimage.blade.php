<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  </head>
  <body>
    <div class="row my-3">


    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

        <table class="table table-responsive">

          <tr>
            <th>SL</th>
            <th>Name</th>
            <th>Image 1</th>
            <th>Image 2</th>
            <th>Image 3</th>
            <th>Image 4</th>
            <th>Image 5</th>
            <th>Action</th>
          </tr>

      @foreach ($images as $row)
          <tr>
            <td>{{ $row->id }}</td>
            <td>{{ $row->name }}</td>
            <td><img src="{{ URL::to($row->image1) }}" style="width:70px; height:60px;" alt=""></td>
            <td><img src="{{ URL::to($row->image2) }}" style="width:70px; height:60px;" alt=""></td>
            <td><img src="{{ URL::to($row->image3) }}" style="width:70px; height:60px;" alt=""></td>
            <td><img src="{{ URL::to($row->image4) }}" style="width:70px; height:60px;" alt=""></td>
            <td><img src="{{ URL::to($row->image5) }}" style="width:70px; height:60px;" alt=""></td>
            <td>
              <a href="{{ url('/edit/image/'.$row->id) }}" class="btn btn-sm btn-info">Edit</a>
              <a href="{{ url('/delete/image/'.$row->id) }}" class="btn btn-sm btn-danger">Delete</a>
            </td>
          </tr>

          @endforeach

        </table>


         </div>
       </div>
  </body>
</html>
