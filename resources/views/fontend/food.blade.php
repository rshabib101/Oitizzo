@extends('layouts.app')
@section('title') {{__('Foods')}} @endsection
@section('content')
    <div class="container">
        <h3 class="text-2xl font-medium text-gray-700">Food List</h3>    
            <div class="row ">
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
            </div>
            <div class="d-flex">
    {{ $foods->links( "pagination::bootstrap-4") }}
    </div>
        </div>
@endsection



