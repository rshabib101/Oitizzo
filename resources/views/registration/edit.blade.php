@extends('admin.layouts.app')
@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{ route('blogs.update',$blog->id) }}" method="POST" enctype="multipart/form-data">
  @csrf
  @method('put')
  <div class="row ">
    <h1 class="h3 mb-3 fw-normal mt-3"><label for="">Blog</label></h1>
  </div>
    <div class="form-floating mt-2 col">
      <input type="text" name="title" value="{{ $blog->title }}" class="form-control" id="floatingInput" placeholder="Tag">
      <label for="">Title</label>
    </div>
    <div class=" mt-2 col col-md-8">
    <label class="form-label">Upload Photo</label>
    <input type="file" value="{{ $blog->photo }}"  name="photo" class="form-control">
    </div>
    <div class="form-floating mt-2 col">
      <input type="textarea" name="details" value="{{ $blog->details }}" class="form-control" id="floatingInput" placeholder="Blog">
      <label for="">Blog</label>
    </div>
    <div class="form-floating mt-2 col">
      <input type="text" name="tag" value="{{ $blog->tag }}" class="form-control" id="floatingInput" placeholder="Tag">
      <label for="">Tag</label>
    </div>
    <button class="btn btn-lg btn-primary justify-content-center mt-3 " type="submit">submit</button>
  </form>
<script src="/js/bootstrap.bundle.min.js"></script>
<script src="/js/bootstrap.js"></script>
<script src="/js/offcanvas.js"></script>
@endsection
