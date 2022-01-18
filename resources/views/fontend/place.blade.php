@extends('layouts.app')
@section('title') {{__('Place')}} @endsection
@section('content')
<div class="container">
<link href="{{ asset('assets/css/grid.css') }}" rel="stylesheet">
  <div class="row">
  @foreach($places as $place)
    <div class="col-sm mt-2 mb-2 ml-2 mr-2">
    <div class="flex-viewport" style="overflow: hidden; position: relative;">
    <li style="width: 270px; display: block;">
        <article class="box">
            <figure> <a href="#" class="hover-effect popup-gallery"><img width="270" height="160" alt="Image" src="{{ Storage::url($place->image) }}" draggable="false"></a> </figure>
            <div class="details mr-2 ml-2">
                <h4 class="box-title">{{$place->name}}</small></h4>
                <h4 class="box-title">{{ $place->district->name }}<h4>
                <div class="feedback">
                    <div data-placement="bottom" data-toggle="tooltip" class="fa fa-star" title="" data-original-title="4 stars"><span style="width: 80%;" class="five-stars"></span></div> <span class="review"></span>
                </div>
                <p class="description">{{$place->description}}</p>
                <div class="action mb-3 mr-2 ml-2"><a class="button btn-small yellow popup-map" href="{{route('places.show',$place->id)}}" data-box="37.089072, -8.247880">VIEW</a> </div>
            </div>
        </article>
    </li>
    </div>
    </div>
    @endforeach
  </div>
  <div class="d-flex">
    {{ $places->links( "pagination::bootstrap-4") }}
    </div>
</div>
@endsection