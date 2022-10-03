

@extends('layout.app')
@section('title')
    All Articles Posted
@endsection

@section('content')

@if(session('failed'))
    <div class="alert alert-danger" role="alert">
  {{session('failed')}}
</div>
@endif
@if(session('delete'))
    <div class="alert alert-danger" role="alert">
  {{session('delete')}}
</div>
@endif
@if(session('success'))
    <div class="alert alert-success" role="alert">
  {{session('success')}}
</div>
@endif
@if(session('success2'))
    <div class="alert alert-success" role="alert">
  {{session('success2')}}
</div>
@endif
<table class="table table-hover">
<tr >
<td ><b>Image<b></td>
<td ><b>Name<b></td>
<td ><b>Description<b></td>
<td ><b>Created AT<b></td>
<td ><b>Bosted By<b></td>
<td > </td>

</tr>

@foreach($posts as $post)
<tr>
<td><img  src="{{ asset('/images/'.$post->file_path)}}" height='200' width='200' /></td>
<td>{{ $post['name']}}</td>
<td>{{ $post['description']}}</td>
<td>{{ $post['created_at']}}</td>
<td>{{ $post->user->name}}</td>

<td><a  class="btn btn-primary"  role="button" href="/welcome/{{ $post['id']}}">View</a>
    <a  class="btn btn-primary"  role="button" href="/welcome/{{ $post['id']}}/edit/{{$post->user->id}}">Edit</a>
    <form action='/welcome/{{ $post['id']}}/{{$post->user->id}}' method="POST">
     @csrf
    @method('delete')
  
    <input type="submit" value=Destroy class="btn btn-danger" >
    </form></td>

</tr>
@endforeach


</table>


@endsection



