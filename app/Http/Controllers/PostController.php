<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use DB;

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
    public function Delete($id){
        $post=Post::find($id);
        if ($post->delete()) {
            $notification = array(
                'messege'=>'Post Deleted Successfully',
                'type'=>'info'
            );

            return Redirect()->back()->with($notification);

        }else{
            return Redirect()->back();
        }

    }
    public function Edit($id){
        $post = Post::find($id);
        return view('editPost',compact('post'));
    }
    public function Update(Request $request,$id){
        $validatedData = $request->validate([
        'title' => 'required|unique:posts|max:255',
        'author' => 'required|min:4|max:40',
        'tag' => 'required',
        'description' => 'required',
        ]);

        $post=Post::findorfail($id);

        $post->title = $request->title;
        $post->author = $request->author;
        $post->tag = $request->tag;
        $post->description = $request->description;

        if ($post->save()) {
            $notification = array(
                'messege'=>'Post Updated Successfully',
                'type'=>'success'
            );

            return Redirect()->route('all.post')->with($notification);

        }else{
            return Redirect()->back();
        }


    }

    public function AddNews(){
        return view('addNews');
    }

    public function CreateNews(Request $request){
        $validatedData = $request->validate([
        'title' => 'required|unique:posts|max:255',
        'author' => 'required|min:4|max:40',
        'image' => 'required',
        'details' => 'required',
        ]);

        $data = array();
        $data['title']=$request->title;
        $data['author']=$request->author;
        $data['details']=$request->details;
        $image = $request->image;

        if($image){
            $image_name = str_random(10);
            $image_ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$image_ext;
            $upload_path = 'public/news/';
            $image_url= $upload_path.$image_full_name;
            $success = $image->move($upload_path,$image_full_name);
            if($success){
                $data['image']=$image_url;
                $news = DB::table('news')->insert($data);
                if ($news) {
                    $notification = array(
                        'messege'=>'News Added Successfully',
                        'type'=>'success'
                    );

                    return Redirect()->back()->with($notification);

                }else{
                    $notification = array(
                        'messege'=>'News Added Fail',
                        'type'=>'success'
                    );

                    return Redirect()->back()->with($notification);
                }
            }else{
                $notification = array(
                    'messege'=>'News Added Fail',
                    'type'=>'success'
                );

                return Redirect()->back()->with($notification);
            }
        }
        
    }

    public function AllNews(){
        $news = DB::table('news')->get();
        return view('all_news',compact("news"));
    }

    public function DeletePost($id){
        $data = DB::table('news')->where('id',$id)->first();
        $image_path=$data->image;
        $delete=DB::table('news')->where('id',$id)->delete();

        if ($delete) {
            unlink($image_path);
            $notification = array(
                'messege'=>'News Deleted Successfully',
                'type'=>'info'
            );

            return Redirect()->back()->with($notification);

        }else{
            return Redirect()->back();
        }
    }
}
