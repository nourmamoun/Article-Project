@extends('layout.app')
@section('title')
    Edit Article
@endsection


@section('content')


<form action="/welcome/{{$post['id']}}" method="POST" enctype="multipart/form-data">
@method('PUT')
@csrf
<div class="mb-3">
    
  </div>
  <div class="mb-3">
    <label  class="form-label">Title Name</label>
    <input type="text" class="form-control" name="title" value="{{$post['name']}}">
    <div  class="form-text"></div>
  </div>
  <div class="mb-3">
    <label  class="form-label">Description</label>
    <input type="text" name="description" class="form-control" value="{{ $post['description'] }}">
  </div>
  <div class="mb-3">
    <label  class="form-label">Upload Image</label>
    <input type="file" name="file" class="form-control" required>
  </div>
  <div class="mb-3" word-wrap: break-word;>
    <label  class="form-label">Type Your Article</label>
    <textarea name="body" class="form-control" rows="4" cols="50" >{{ $post['body'] }} </textarea>
  </div>
  
  
  <button type="submit" class="btn btn-primary">Submit</button>
  
</form>

@endsection

