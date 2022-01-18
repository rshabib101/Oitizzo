@extends('layouts.dashboard')
@section('title') {{__('Foods')}} @endsection
@section('content')
<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Order List </h2>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p></p>
        </div>
    @endif

    <table class="table table-bordered table-responsive-lg">
        <tr>
            <th>No</th>
            <th>User Name</th>
            <th>Image</th>
            <th>Food Name</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Oder Time</th>
        </tr>
    
        @foreach ($orders as $order)
            <tr>
                <td>  
                {{ ++$i }}
                </td>
                <td>{{$order->users->name}}</td>
                <td><img src="{{ Storage::url($order->image) }}" alt="Image" style="width:50px; height:50px;"></td>
                <td>{{$order->name}}</td>
                <td>{{$order->quantity}}</td>
                <td>{{$order->price}}</td>
                <td>{{$order->created_at}}</td>
            </tr>
        @endforeach 
    </table>
    <div class="d-flex">
    {{ $orders->links( "pagination::bootstrap-4") }}
    </div>
@endsection
