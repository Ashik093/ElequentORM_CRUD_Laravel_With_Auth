<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;

use Illuminate\Support\Facades\Hash;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function ChangePassword(){
        return view('auth.changePassword');
    }
    public function UpdatePassword(Request $request){
        $password = Auth::User()->password;
        $oldpassword = $request->oldpassword;
        if(Hash::check($oldpassword,$password)){
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();

            if ($user->save()) {
                $notification = array(
                    'messege'=>'Password Changed Successfully',
                    'type'=>'success'
                );

                return Redirect()->route('login')->with($notification);

            }else{
                $notification = array(
                    'messege'=>'Password Did Not Match',
                    'type'=>'error'
                );
                return Redirect()->back()->with($notification);
            }
        }else{
            $notification = array(
                    'messege'=>'Password Did Not Match',
                    'type'=>'error'
            );
            return Redirect()->back()->with($notification);
        }
    }

}
