<!DOCTYPE html>
<html lang="en" dir="ltr">
 <head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="{{asset('backend')}}/dist/css/adminlte.min.css">
   <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}" media="all" />
   <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}" media="all" />
   <link rel="stylesheet" type="text/css" href="{{ asset('css/responsive.css') }}" media="all" />
   <link rel="stylesheet" type="text/css" href="{{ asset('css/navbar-fixed.css') }}" media="all" />
   <link rel="stylesheet" type="text/css" href="{{ asset('fonts/font.css') }}" media="all" />
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
   <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
   <link rel="shortcut icon" type="image/x-icon"  href="{{ asset('images/favicon.ico') }}"/>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" type="text/css" href="{{ asset('css/select2.min.css') }}" media="all" />
   <!-- Latest compiled and minified CSS -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
   <!-- Latest compiled and minified JavaScript -->
   <!------ Include the above in your HEAD tag ---------->

<link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css"  media="screen">
<script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>

<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js" defer ></script>
 <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js" defer ></script>
 <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />



   <title>kalam</title>

   <script src="{{ asset('js/app.js') }}"></script>
   <!---font---->
   <script src="{{ asset('js/all.js') }}"></script>

</style>
<script src=”https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js”></script>



 </head>

 <body>



@yield('content')






<script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>


      <!---jquery---->
      <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
      <!----script js---->
      <script src="{{ asset('js/script.js') }}"></script>
      <!----bootstrap js---->
      <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

      <script src="{{asset('backend')}}/dist/js/adminlte.js"></script>




      <script src="{{ asset('js/select2.full.min') }}"></script>


      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
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
