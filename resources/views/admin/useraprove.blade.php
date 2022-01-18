@extends('layouts.dashboard')
@section('title')
{{__('Approval For')}} {{ $user->name }}
@endsection
@section('content')

<form action="{{route('adminactions.update',$user->id)}}" method="POST" enctype="multipart/form-data">
   @csrf
   @method('put')
    <div class="row">
  <div class="form-group col col-md-4">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $user->name }}" readonly>
  </div>
  <div class="form-group col col-md-4">
    <label for="exampleInputEmail1">Number</label>
    <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $user->number }}" readonly>
  </div>
  <div class="form-group col col-md-4">
    <label for="exampleInputEmail1">Email</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $user->email }}" readonly>
  </div>
  </div>
  <div class="row">
  <div class="form-group col col-md-4">
    <label for="category">Select Approval</label>
    <select name="isApprove" id="category" class="form-control">
        <option value="" style="display: none" selected>Select </option>
        <option value="active"> {{ __('Active')}} </option>
        <option value="inactive"> {{ __('Inactive')}} </option>
    </select>
  </div>
  <div class="form-group col col-md-4">
    <label for="categor2">Approve Food</label>
    <select name="isFoodDelar" id="category2" class="form-control">
        <option value="" style="display: none" selected>Select </option>
        <option value="active"> {{ __('Active')}} </option>
        <option value="inactive"> {{ __('Inactive')}} </option>
    </select>
  </div>
  <div class="form-group col col-md-4">
    <label for="category3">Approve Place</label>
    <select name="isPlaceUploder" id="category3" class="form-control">
        <option value="" style="display: none" selected>Select</option>
        <option value="active"> {{ __('Active')}} </option>
        <option value="inactive"> {{ __('Inactive')}} </option>
    </select>
  </div>
  </div>
  <button type="submit" class="btn btn-primary justify-content-center">Submit</button>
</form>
@endsection
