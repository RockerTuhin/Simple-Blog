<?php

namespace App\Http\Controllers;
use App\Http\requests;
use Illuminate\Http\Request;
use Mail;
use App\Post;
use Auth;
use Session;
use Redirect;
use Image;
use Storage;
use App\Mailfile;
class MailController extends Controller
{
    public function mail_form() {
    	return view('Mail.mail_form');
    }
    public function send_mail(Request $request) {
    	$validatedData = $this->validate($request,[
		        //'from' => 'required|email',
		        'to' => 'required|email',
		        'subject' => 'min:3',
		        'message' => 'min:10',
		        // 'attach_file' => 'mimes:jpeg,png,jpg,gif,svg,txt,pdf,ppt,docs,doc,xls',
		    	]);
    	// $data = array(
     //        'to' => $request->to,
     //        'subject' => $request->subject,
     //        'bodyMessage' => $request->message,
     //        'attach_file' => $request->attach_file,
     //    );
    	//$data['from'] =>'rockertuhin9669@gmail.com';
        $data = array();
    	$data['to'] = $request->to;
    	$data['subject'] = $request->subject;
    	$data['bodyMessage'] = $request->message;
    	$data['attach_file'] = $request->file('attach_file');
    	$check = Mail::send('Mail.email_contact', $data, function($message) use($data)
    	{
    		//$message->from($data['from']);
    		$message->to($data['to']);
    		$message->subject($data['subject']);
    		$message->attach($data['attach_file']->getRealPath(),array(
    			 'as' => $data['attach_file']->getClientOriginalName(),
    			'mime' => $data['attach_file']->getMimeType(),
    			)
    	);
    	});
        if($check)
        {
            $notification = array(
                'message' => 'Your mail send Successfully!',
                'alert-type' => 'success',
            );
            return Redirect()->back()->with($notification);
        }
        else
        {
          $notification = array(
                'message' => 'Your mail send Successfully!',
                'alert-type' => 'success',
            );
            return Redirect()->back()->with($notification);
        }
    }
}
