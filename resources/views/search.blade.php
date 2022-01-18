@extends('layouts.app')
@section('title')
@section('content')
<div class="container">
<link href="{{ asset('assets/css/grid.css') }}" rel="stylesheet">
<div class="justify-content-center"><h1>For Historical Food</h1></div>
@if($foods->isNotEmpty())
   <hr>
     <div class="row">
            @foreach($foods as $food)
            <div class="col-sm mt-2 mb-2 ml-2 mr-2">
                <div class="flex-viewport" style="overflow: hidden; position: relative;">
                <li style="width: 270px; display: block;">
                    <article class="box">
                        <figure> <a href="#" class="hover-effect popup-gallery"><img width="270" height="160" alt="Image"  src="{{ Storage::url($food->image) }}" draggable="false"></a> </figure>
                        <div class="details mr-2 ml-2"> <span class="price">{{ $food->price }}<small>Tk</small></span>
                            <h4 class="box-title">{{ $food->name }}<h4>
                            <h4 class="box-title">{{ $food->district->name }}<h4>
                            <p class="description">{{ $food->description }}</p>
                            <div class="action mb-3 mr-2 ml-2"> 
                        <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
                             @csrf
                            <input type="hidden" value="{{ $food->id }}" name="id">
                            <input type="hidden" value="{{ $food->name }}" name="name">
                            <input type="hidden" value="{{ $food->price }}" name="price">
                            <input type="hidden" value="{{ $food->image }}"  name="image">
                            <input type="hidden" value="1" name="quantity">
                            <button class="btn btn-primary">Add To Cart</button>
                         </form>
                            </div>
                        </div>
                    </article>
                </li>
                </div>
                </div>
            @endforeach
            @else 
                <div>
                    <h2>No Foods found</h2>
                </div>
            @endif
        </div> 
        <div class="justify-content-center"><h1>For Historical Place</h1></div>
        @if($places->isNotEmpty())
        <hr>
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
                @else 
                <div>
                    <h2>No Foods found</h2>
                </div>
            @endif
    </div>
    </div>
  </div>
@endsection