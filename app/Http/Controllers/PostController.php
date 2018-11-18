<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\post;
class PostController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
    public function insert_post(Request $request)
    {
    	$validatedData = $request->validate([
		        'title' => 'required|unique:posts|max:255',
		        'description' => 'required',
		        'author' => 'required|min:4|max:30',
		        'tags' => 'required',
		    	]);

    	$post = new post;
    	$post->title = $request->title;
    	$post->author = $request->author;
    	$post->tag = $request->tags;
    	$post->description = $request->description;
    	$post->save();
    	if($post->save())
    	{
    		$notification = array(
    			'message' => 'Post Added Successfully',
    			'alert-type' => 'success',
    		);
    		return Redirect()->back()->with($notification);
    	}
    	else 
    	{
    		$notification = array(
    			'message' => 'Post Not Added Successfully',
    			'alert-type' => 'info',
    		);
    		return Redirect()->back()->with($notification);
    	}

    }
    public function all_post()
    {
    	$all_post = Post::all();
    	
    	return view('all_post')->with('all_post_info',$all_post);
    }
    public function delete_post($id)
    {
    	$singlepost = post::find($id);

    	$del = $singlepost->delete();
 
    	if($del)
    	{
    		$notification = array(
    			'message' => 'Post Deleted Successfully',
    			'alert-type' => 'info',
    		);
    		return Redirect()->back()->with($notification);
    	}
    	else 
    	{
    		$notification = array(
    			'message' => 'Post Not Deleted Successfully ',
    			'alert-type' => 'info',
    		);
    		return Redirect()->back()->with($notification);
    	}
    }
    public function edit_post($id)
    {
    	$singlepost = Post::findorfail($id);

    	return view('edit_post',compact('singlepost'));
    }
    public function update_post(Request $request,$id)
    {
    	$validatedData = $request->validate([
		        'title' => 'required|max:255',
		        'description' => 'required',
		        'author' => 'required|min:4|max:30',
		        'tags' => 'required',
		    	]);
    	$singlepost = Post::findorfail($id);
    	$singlepost->title = $request->title;
    	$singlepost->author = $request->author;
    	$singlepost->tag = $request->tags;
    	$singlepost->description = $request->description;
    	$singlepost->save();
    	if($singlepost->save())
    	{
    		$notification = array(
    			'message' => 'Post Updated Successfully',
    			'alert-type' => 'success',
    		);
    		return Redirect()->route('home')->with($notification);
    	}
    	else 
    	{
    		$notification = array(
    			'message' => 'Post Not updated Successfully',
    			'alert-type' => 'info',
    		);
    		return Redirect()->route('home')->with($notification);
    	}
    }
}
