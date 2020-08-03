<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!---bootstrap css--->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}"/>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('css/all.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('css/adminlte.min.css')}}">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

    <title></title>

    <!---font---->
    <script src="js/all.js"></script>
    <style>

    </style>
  </head>
  <body >




@yield('content')




    <!---jquery---->
    <script src="{{ asset('js/jquery-3.3.1.min.js')}}"></script>
    <!----script js---->
    <script src="{{ asset('js/script.js')}}"></script>

    <script src="{{ asset('js/navbar-fixed.js')}}"></script>
    <!----bootstrap js---->
    <script src="{{ asset('js/bootstrap.bundle.min.js')}}"></script>

    <!-- jQuery -->
     <script src="{{ asset('js/jquery.min.js')}}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('js/bootstrap.bundle.min.js')}}"></script>
    <!-- bs-custom-file-input -->
    <script src="{{ asset('js/bs-custom-file-input.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('js/adminlte.min.js')}}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('js/demo.js')}}"></script>
    <script type="text/javascript">
    $(document).ready(function () {
      bsCustomFileInput.init();
    });
     </script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

     <script>
  @if(Session::has('message'))
      var type="{{Session::get('alert-type','info')}}"
      switch(type) {
        case 'info':
              toastr.info("{{ Session::get('message') }}");
              break;
        case 'success':
             toastr.success("{{ Session::get('message') }}");
             break;
        case 'warning':
             toastr.warning("{{ Session::get('message') }}");
             break;
        case 'error':
            toastr.error("{{ Session::get('message') }}");
             break;
      }
      @endif
</script>
     </body>
     </html>
