<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function Store(Request $request){
    	$validatedData = $request->validate([
        'title' => 'required|unique:posts|max:255',
        'author' => 'required|min:4|max:40',
        'tag' => 'required',
        'description' => 'required',
    	]);

    	$post = new Post;
    	$post->title = $request->title;
    	$post->author = $request->author;
    	$post->tag = $request->tag;
    	$post->description = $request->description;

    	if ($post->save()) {
    		$notification = array(
    			'messege'=>'Post Added Successfully',
    			'type'=>'success'
    		);

    		return Redirect()->back()->with($notification);

    	}else{
    		return Redirect()->back();
    	}


    }
    public function AllPost(){
    	$post = Post::all();
    	return view('all_post')->with('post',$post);
    }
}
