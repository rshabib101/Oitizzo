@extends('layouts.dashboard')
@section('title')
{{__('User List')}}
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>User List </h2>
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
            <th>Name</th>
            <th>Number</th>
            <th>Email</th>
            <th>Approval</th>
            <th>Food Post</th>
            <th>Place Post</th>
            <th>Actions</th>
        </tr>
        @foreach ($users as $user)
            <tr>
                <td>  
                {{ ++$i }}
                </td>
                <td>{{$user->name}}</td>
                <td>{{$user->number}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->isApprove}}</td>
                <td>{{$user->isFoodDelar}}</td>
                <td>{{$user->isPlaceUploder}}</td>
                <td>
                    <form action="" method="POST">

                        <a href="{{ route('users.show',$user->id) }}" title="show">
                            <i class="fas fa-eye text-success  fa-lg"></i>
                        </a>
                        <a href="{{ route('adminactions.edit',$user->id) }}">
                            <i class="fas fa-edit  fa-lg"></i>
                            
                        </a>

                    </form>
                </td>
            </tr>
        @endforeach
    </table>

@endsection
