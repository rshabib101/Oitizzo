@extends('layouts.dashboard')
@section('title')
{{__('Show Food ')}}
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Food Details</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('foods.index') }}"> Back</a>
            </div>
        </div>
    </div>
     
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label for="" style="color:orange;"><strong>Name:</strong></label>
                {{ $food->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                 <label for="" style="color:orange;"><strong>Details:</strong> </label>
                {{ $food->description }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                 <label for="" style="color:orange;"><strong>Image:</strong></label>
                <img src="{{ Storage::url($food->image) }}" alt="Image" width="500px">
            </div>
        </div>
    </div>
@endsection