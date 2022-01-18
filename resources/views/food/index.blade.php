@extends('layouts.dashboard')
@section('title')
{{__('Food List')}}
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Food List </h2>
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
            <th>Delar</th>
            <th>Image</th>
            <th>Name</th>
            <th>Category</th>
            <th>Description</th>
            <th>Price</th>
            <th>Action</th>
        </tr>
    
        @foreach ($foods as $food)
            <tr>
                <td>  
                {{ ++$i }}
                </td>
                <td>{{$food->user->name}}</td>
                <td><img src="{{ Storage::url($food->image) }}" alt="Image" style="width:50px; height:50px;"></td>
                <td>{{$food->name}}</td>
                <td>{{$food->categories->name}}</td>
                <td>{{$food->description}}</td>
                <td>{{$food->price}}</td>
                <td>
                @if(Auth::user()->id == $food->user_id )
                <form action="{{ route('foods.destroy',$food->id) }}" method="POST">
                        <a href="{{ route('foods.show',$food->id) }}" title="show">
                            <i class="fas fa-eye text-success  fa-lg"></i>
                        </a>
                        <a href="{{ route('foods.edit',$food->id) }}">
                            <i class="fas fa-edit  fa-lg"></i>
                        </a>
                        @csrf
                        @method('DELETE')
                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash  "></i></button>
                </form>
                @endif
       
                </td>
            </tr>
        @endforeach 
    </table>
    <div class="d-flex">
    {{ $foods->links( "pagination::bootstrap-4") }}
    </div>
@endsection
