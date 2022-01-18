@extends('layouts.dashboard')
@section('title')
{{$user->name}}
@endsection
@section('content')
   <div class="card justify-content-center ml-5">
    <div class="row  justify-content-center">
        <div class="col"> 
        <div class="col-xs-12 col-sm-12 col-md-12 ml-5">
           <span style="color:orange; font-size:20px;">User Details</span> 
            <div class="form-group">
                <strong>{{$user->name}}</strong>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 ml-5">
            <div class="form-group">
                <strong>{{$user->number}}</strong>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 ml-5">
            <div class="form-group">
                <strong>{{$user->email}}</strong>

            </div>
        </div>

    </div>
    <div class="col"> 
    <div class="col-xs-12 col-sm-12 col-md-12 ml-5">
    <span style="color:orange; font-size:20px;">User Approval</span> 
            <div class="form-group">
                
                <strong>Account : {{$user->isApprove}}</strong>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 ml-5">
            <div class="form-group">
                 
                <strong> Food Delar : {{$user->isFoodDelar}}</strong>
            </div>
       </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Place Uploader : {{$user->isPlaceUploder}}</strong>
            </div>
       </div>
    </div>
   </div>
</div>
@endsection