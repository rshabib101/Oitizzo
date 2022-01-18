@extends('layouts.dashboard')
@section('title')
{{$user->name}}
@endsection
@section('content')
<form action="{{ route('userprofile.Update',$user->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
    <div class="row">
  <div class="form-group col col-md-4">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$user->name}}">
  </div>
  <div class="form-group col col-md-4">
    <label for="exampleInputEmail1">Number</label>
    <input type="number" name="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$user->number}}">
  </div>
  <div class="form-group col col-md-4">
    <label for="exampleInputEmail1">Email</label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$user->email}}">
  </div>

  
  <div class="form-group col col-md-4">
    <label for="exampleInputPassword1">Password</label>
    <input name="password" type="password" class="form-control" id="exampleInputPassword1" >
  </div>
  </div>
  <button type="submit" class="btn btn-primary justify-content-center">Update</button>
</form>
{{--
  //comment out
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-sm">Upload Photo</button>
<div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
    <div class="form-group col col-md-10">
    
    <form action="{{ route('profile.photo.update',$user->id) }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('put')
      <input type="hidden" name="user_id " class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ Auth::user()->id }}" placeholder="id">
      <label for="exampleInputEmail1">Adress</label>
      <input type="text" name="adress" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$user->profiles->adress ?? ' '}}" placeholder="123-45-678">
      <label for="exampleInputEmail1">Description</label>
      <input type="text" name="description" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$user->profiles->description ?? ' '}}" placeholder="description">
      <input type="file" name="image" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$user->profiles->adress ?? ' '}}">
    <button type="submit" class="btn btn-primary pt-3">Save</button>
    </from>
  </div>
    </div>
  </div>

</div>
--}}
@endsection
