@extends('layouts.dashboard')
@section('title')
{{__('Food Edit')}}
@endsection
@section('content')
<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h3 class="card-title">Create Place</h3>
                            <a href="{{ route('places.index') }}" class="btn btn-primary">Back to  List</a>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-12 col-lg-8 offset-lg-2 col-md-8 offset-md-2">
                                <form action="{{ route('places.update',$place->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('put')
                                    <div class="card-body">

                                        
                                        <div class="form-group">
                                            <label for="title">Place Name</label>
                                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" class="form-control" placeholder="Enter name" required>
                                            <input type="hidden" name="district_id" value="{{ Auth::user()->district_id }}" class="form-control" placeholder="Enter title" required>
                                            <input type="hidden" name="district_name" value="{{ Auth::user()->district->name}}" class="form-control" placeholder="Enter title" required>
                                            <input type="name" name="name" value="{{ $place->name}}" class="form-control" placeholder="Enter title" required>
                                        </div>    
                                        <input type="hidden" name="category_id" value="2" class="form-control" placeholder="Enter name" required>
                                        <div class="form-group">
                                            <label for="image">Image</label>
                                            <div class="">
                                                <input type="file" name="image" class="from-control" id="image">
                                                
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Description</label>
                                            <textarea name="description" id="description" rows="4" class="form-control"
                                                placeholder="Enter description">{{ $place->description }}</textarea>
                                        </div>
                                    </div>

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-lg btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('/admin/css/summernote-bs4.min.css') }}">
@endsection

@section('script')
    <script src="{{ asset('/admin/js/summernote-bs4.min.js') }}"></script>
    <script>
        $('#description').summernote({
            placeholder: 'Hello Bootstrap 4',
            tabsize: 2,
            height: 300
        });
    </script>
@endsection