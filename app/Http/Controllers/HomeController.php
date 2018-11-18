<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;
use App\User;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function change_password()
    {
        return view('auth.change_password');
    }
    public function update_password(Request $request)
    {
        $password = Auth::user()->password;
        $oldpassword = $request->oldpassword;
        if(Hash::check($oldpassword, $password))
        {
            $user = User::find(Auth::id());
            $new_password = $request->new_password;
            $password_confirmation = $request->password_confirmation;
            if($new_password == $password_confirmation)
            {
                $notification = array(
                    'message' => 'Your Password Change Successfully!',
                    'alert-type' => 'success',
                );
                $user->password = Hash::make($request->new_password);
                $user->save();
                Auth::logout();
                return Redirect()->route('login')->with($notification);
            }
            else
            {
                $notification = array(
                    'message' => 'New Password and Confirm Password Not Matched!',
                    'alert-type' => 'error',
                );
                return Redirect()->back()->with($notification);
            }
        }
        else
        {
            $notification = array(
                'message' => 'Authentication Password and Your Given Old Password Not Matched!',
                'alert-type' => 'error',
            );
            return Redirect()->back()->with($notification);
        }

    }
}
