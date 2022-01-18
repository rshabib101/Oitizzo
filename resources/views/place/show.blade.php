@extends('layouts.dashboard')
@section('title')
{{__('Show place')}}
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Place Details</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('places.index') }}"> Back</a>
            </div>
        </div>
    </div>
     
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label for="" style="color:orange;"><strong>Name:</strong></label>
                {{ $place->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                 <label for="" style="color:orange;"><strong>Details:</strong> </label>
                {{ $place->description }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                 <label for="" style="color:orange;"><strong>Image:</strong></label>
                <img src="{{ Storage::url($place->image) }}" alt="Image" width="500px">
            </div>
        </div>
    </div>
@endsection