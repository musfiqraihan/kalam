@extends('layouts/app')

@section('content')
<h1>Courier</h1>
  <a class="btn btn-primary btn-lg" href="{{ route('add.image') }}">Add Image</a>
  <a class="btn btn-primary btn-lg" href="{{ route('show.image') }}">Show Image</a>

@endsection
