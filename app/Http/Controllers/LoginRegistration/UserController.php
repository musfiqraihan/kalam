<?php

namespace App\Http\Controllers\LoginRegistration;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class UserController extends Controller
{
  public function userRegistration()
{
  return view('users.userregister');
}
public function processRegister(Request $request)
{
  $request->validate([
   'full_name' => 'required',
   'email' => 'required|email|unique:users,email',
   'mobile_number' => 'required|min:6|max:13|regex:/^([0-9\s\-\+\(\)]*)$/|unique:users,mobile_number',
   'password' => 'required|min:8|confirmed'
]);

$data =[
  'full_name'  =>$request->input('full_name'),
  'email'  =>strtolower($request->input('email')),
  'mobile_number' =>$request->input('mobile_number'),
  'password' => bcrypt($request->input('password')),
];

   DB::table('users')->insert($data);
     $notification=array(
         'message'=>'User account created',
         'alert-type'=>'success'
     );
      return redirect()->route('userloginpage')->with($notification);
  }

public function userLogin()
{
    return view('users.userlogin');
}
public function processLogin(Request $request)
{
  $request->validate([
   'email' => 'required|email',
   'password' => 'required|min:8'
]);
  $credentials = $request->except(['_token']);

  if(auth()->attempt($credentials)){
    $notification=array(
        'message'=>'Successfully Logged In',
        'alert-type'=>'success'
    );
    return redirect()->route('profile')->with($notification);
  }else{
    $notification=array(
        'message'=>'Invalid Credentials.',
        'alert-type'=>'success'
    );
    return redirect()->back()->with($notification);
  }
}

public function showProfile()
{
  return view('users.dashboard');
}

public function logout()
{
    auth()->logout();
    $notification=array(
        'message'=>'Logged out Successfully',
        'alert-type'=>'success'
    );
    return view('welcome')->with($notification);
  }
}
