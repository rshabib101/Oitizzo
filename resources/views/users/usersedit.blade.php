@extends('layouts.app')
@section('content')
<form action="{{route('sendmessage')}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')
    <div class="row">
  <div class="form-group col col-md-10">
    <label for="exampleInputEmail1">Description</label>
    <input type="hidden" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{Auth::user()->name}}">
    <input type="text" name="description" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Writing">
    <input type="hidden" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{Auth::user()->email}}">
  </div>
  </div>
  <button type="submit" class="btn btn-primary justify-content-center">Send</button>
</form>
@endsection
