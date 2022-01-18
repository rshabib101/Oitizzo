@extends('layouts.dashboard')
@section('title')
{{__('Users message')}}
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Message </h2>
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
            <th>Message</th>
            <th>Email</th>
        </tr>
        @foreach ($messages as $user)
            <tr>
                <td>  
                {{ ++$i }}
                </td>
                <td>{{$user->name}}</td>
                <td>{{$user->description}}</td>
                <td>{{$user->email}}</td>
            </tr>
        @endforeach
    </table>

@endsection
