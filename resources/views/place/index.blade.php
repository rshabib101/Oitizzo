@extends('layouts.dashboard')
@section('title')
{{__('Place List')}}
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Place List </h2>
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
            <th>Place Name</th>
            <th>Category</th>
            <th>Description</th>
            <th>Action</th>
        </tr>
    
        @foreach ($places as $place)
            <tr>
                <td>  
                {{ ++$i }}
                </td>
                <td>{{$place->user->name}}</td>
                <td><img src="{{ Storage::url($place->image) }}" alt="Image" style="width:50px; height:50px;"></td>
                <td>{{$place->name}}</td>
                <td>{{$place->categories->name}}</td>
                <td>{{$place->description}}</td>
                <td>
                @if(Auth::user()->id == $place->user_id )
                <form action="{{ route('places.destroy',$place->id) }}" method="POST">
                        <a href="{{ route('places.show',$place->id) }}" title="show">
                                <i class="fas fa-eye text-success  fa-lg"></i>
                            </a>
                        <a href="{{ route('places.edit',$place->id) }}">
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

@endsection
