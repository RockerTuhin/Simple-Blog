<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class NewsController extends Controller
{
    public function add_news()
    {
    	return view('add_news');
    }
    public function all_news() {
        $all_news_info = DB::table('newss')->get();
        return view('all_news',compact('all_news_info'));
    }
    public function view_news($id)
    {
        $single_news_info = DB::table('newss')->where('id',$id)->first();
        return view('single_news')->with('single_news_info',$single_news_info);
    }
    public function delete_news($id)
    {
        //FOR DELETING IMAGE FROM PUBLIC/FRONTENED
        $img = DB::table('newss')->where('id',$id)->first();
        $img_path = $img->image;
        $done = unlink($img_path);
        //FOR DELETING FULL ROW OF THE TABLE
        $delete = DB::table('newss')->where('id',$id)->delete();
        if($delete)
        {
            $notification = array(
                'message' => 'News Deleted Successfullly',
                'alert-type' => 'error',
            );
            return Redirect()->back()->with($notification);
        }
        else
        {
            $notification = array(
                'message' => 'News Not Deleted Successfullly',
                'alert-type' => 'error',
            );
            return Redirect()->back()->with($notification);
        }
    }
    public function insert_news(Request $request) {
    	$validatedData = $request->validate([
		        'title' => 'required|unique:posts|max:255',
		        'details' => 'required',
		        'author' => 'required|min:4|max:30',
		        'image' => 'required',
		    	]);

    	$data = array();
    	$data['title'] = $request->title;
    	$data['author'] = $request->author;
    	$data['details'] = $request->details;//IT WILL be USE TO AVOID HTML TAGS FROM DESCRIPTION = strpos($request->details);
    	$image = $request->image;
    	if($image)
    	{
    		$image_name = str_random(20);
    		$ext = strtolower($image->getClientOriginalExtension());
    		$image_full_name = $image_name.'.'.$ext;
    		$upload_path = 'public/news/';
    		$image_url = $upload_path.$image_full_name;
    		$success = $image->move($upload_path,$image_full_name);
    		if($success)
    		{
    			$data['image'] = $image_url;
    			$news = DB::table('newss')->insert($data);
    			if($news)
    			{
    				$notification = array(
    					'message' => 'News Inserted Successfully',
    					'alert-type' => 'success',
    				);
    				return Redirect()->route('/all-news')->with($notification);
    			}
    			else
    			{
    				$notification = array(
    					'message' => 'News Not Inserted Successfully',
    					'alert-type' => 'error',
    				);
    				return Redirect()->back()->with($notification);
    			}
    		}
    		else
    		{
    			$notification = array(
    					'message' => 'News Not Updated Successfully',
    					'alert-type' => 'error',
    				);
    			return Redirect()->back()->with($notification);
    		}
    	}
    }
}
