<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\Post;
use App\Http\Requests\StoreRequest;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    function mainPage(){
       $posts=Post::all();
       return view('welcome',compact('posts'));
    }

    function show($ID){
        
        $post=Post::find($ID);      
        return view('pages.view',compact('post'));
    }

    function create(){
        return view('pages.create');
    }

    function store(StoreRequest $request){
         $file_extension = $request -> file -> getClientOriginalExtension();
         $file_name = time().'.'.$file_extension;
         $path='images';
         $request -> file -> move($path,$file_name);
         $data = $request->all();
             Post::create([
            "name"=> $data["title"],
            "description"=> $data["description"], 
            "user_id"=> Auth::id(),
            "file_path"=>  $file_name,
            "body"=>$data["body"],

                         ]);
         return redirect('/welcome');
    }

    function edit($ID,$user_id){
    if(Auth::user()->id == $user_id)
    {
        $post=Post::find($ID);        
        return view('pages.edit',compact('post'));
    } else
    {
        return redirect('/welcome')->with('failed','You are not Allowed to edit this article');
    }
       
    }

    function update($ID,StoreRequest $request){
     $file_extension = $request -> file -> getClientOriginalExtension();
    $file_name = time().'.'.$file_extension;
    $path='images';
    $request -> file -> move($path,$file_name);
   
       $data=$request->all();
        $post=Post::find($ID);
     
         $post->name = $data['title'];
         $post->description = $data['description'];
         $post->file_path = $file_name;
         $post->body = $data['body'];
  
    $post->save();
      return redirect('/welcome')->with('success','Article Has Been Edited Succesfuly');
    }


    function destroy($ID,$user_id){
        if(Auth::user()->id == $user_id)
        {
         Post::destroy($ID);
         return redirect('/welcome')->with('success2','Article Deleted Succesfuly');
        }
       else
       {
        return redirect('/welcome')->with('delete','You are not Allowed to delete this article');
       }
    }
}


