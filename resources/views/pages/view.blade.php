@extends('layout.app')
@section('title')
    View Article
@endsection

@section('content')
<img  src="{{ asset('/images/'.$post->file_path)}}" height='100' width='100' style='float:right' />
<div class="container text-center" >
  <div class="row" >
  
    <div class="col" style="font-size: 1.5em;">
     Article Name: {{ $post['name'] }}
    </div>
    <div class="col order-5" style="font-size: 1.5em;">
     Description: {{ $post['description'] }}
    </div>
    <div class="col order-1" style="font-size: 1.5em;">
     Created At: {{ $post['created_at'] }}
    </div>
    <div class="col order-1" style="font-size: 1.5em;">
     Posted By: {{ $post->user->name }}
    </div>
  </div>
</div>
<hr size="8" width="90%" color="black">  
<br><br>
<div  style="font-size: 1.3em;" class="container-fluid" >
{{ $post['body'] }}
</div>



@endsection

