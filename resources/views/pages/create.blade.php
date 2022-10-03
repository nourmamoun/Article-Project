@extends('layout.app')
@section('title')
    Add New Article
@endsection

@section('content')
<form action="/welcome" method="post" enctype="multipart/form-data">
@csrf
  <div class="mb-3" >
    <label  class="form-label">Title Name</label>
    <input type="text" class="form-control" name="title" >
    <div id="emailHelp" class="form-text"></div>
  </div>
  <div class="mb-3">
    <label  class="form-label">Description</label>
    <input type="text" name="description" class="form-control" >
  </div>
  <div class="mb-3">
    <label  class="form-label">Upload Image</label>
    <input type="file" name="file" class="form-control" required>
  </div>
  <div class="mb-3" word-wrap: break-word;>
    <label  class="form-label">Type Your Article</label>
    <textarea name="body" class="form-control" rows="4" cols="50" ></textarea>
  </div>
  
  
  <button type="submit" class="btn btn-primary">Submit</button>
  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
</form>

@endsection

