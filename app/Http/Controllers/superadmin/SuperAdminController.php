<?php

namespace App\Http\Controllers\superadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class SuperAdminController extends Controller
{
    public function addcatgory()
    {
      return view('SuperAdmin.userscategory.addcategory');
    }

    public function storecatgory(Request $request)
    {
      $validatedData = $request->validate([
      'name'=>'bail|required|unique:userscategories|max:25'
    ]);
    $data=array();
    $data['name']=$request->name;

      DB::table('userscategories')->insert($data);
      if($data){
        $notification=array(
            'message'=>'Successfully inserted data',
            'alert-type'=>'success'
        );
        return redirect()->route('viewcategory')->with($notification);
      }else{
        $notification=array(
            'message'=>'Something went wrong',
            'alert-type'=>'error'
        );
        return redirect()->back()->with($notification);
      }
    }
    public function viewcategory(Request $request)
    {
      $userscategories = DB::table('userscategories')->get();
      return view('SuperAdmin.userscategory.viewcategory',compact('userscategories'));
    }
    public function editcategory($id)
    {
      $userscategories=DB::table('userscategories')->where('id',$id)->first();
      return view('SuperAdmin.userscategory.editcategory',compact('userscategories'));
    }
    public function updatecategory(Request $request,$id)
    {
      $validatedData = $request->validate([
      'name'=>'required | unique:userscategories|max:25'
    ]);
    $data=array();
    $data['name']=$request->name;
      DB::table('userscategories')->where('id',$id)->update($data);
      if($data){
        $notification=array(
            'message'=>'Successfully updated data',
            'alert-type'=>'success'
        );
        return redirect()->route('viewcategory')->with($notification);
      }else{
        $notification=array(
            'message'=>'Something went wrong',
            'alert-type'=>'error'
        );
        return redirect()->back()->with($notification);
      }

  }
    public function deletecategory($id)
    {
      $userscategories=DB::table('userscategories')->where('id',$id)->first();
         $delete=DB::table('userscategories')->where('id',$id)->delete();
         if ($delete) {
           $notification=array(
             'message'=>'Successfully Deleted!',
             'alert-type'=>'success'
           );
           return redirect()->back()->with($notification);
    }else{
        $notification=array(
            'message'=>'Something went wrong',
            'alert-type'=>'error'
        );
        return redirect()->back()->with($notification);
      }
 }

//admin users registration part
    public function adduser()
    {
      $userscategories = DB::table('userscategories')->get();
      return view('SuperAdmin.usersregistration.register',compact('userscategories'));
    }
    public function processuser(Request $request)
    {
      $validatedData = $request->validate([
      'username'=>'required|max:25',
      'email' => 'required|email|unique:usersregistration,email',
      'mobile_number' => 'required|min:6|max:13|regex:/^([0-9\s\-\+\(\)]*)$/|unique:usersregistration,mobile_number',
      'password' => 'required|min:8|confirmed',
      'address'=>'required',
      'userimage'=>'required|mimes:png,PNG,jpg,JPG,jpeg,JPEG|max:5000'
    ]);
    $data=array();
    $data['users_id']=$request->users_id;
    $data['username']=$request->username;
    $data['email']=$request->email;
    $data['mobile_number']=$request->mobile_number;
    $data['password']=bcrypt($request->password);
    $data['address']=$request->address;
    $image = $request->file('userimage');
    if ($image) {
    $image_name=hexdec(uniqid());
    $ext=strtolower($image->getClientOriginalExtension());
    $image_full_name=$image_name.'.'.$ext;
    $upload_path='images/users/';
    $image_url=$upload_path.$image_full_name;
    $success=$image->move($upload_path,$image_full_name);
    $data['userimage']=$image_url;
    DB::table('usersregistration')->insert($data);
    $notification=array(
        'message'=>'Successfully inserted data',
        'alert-type'=>'success'
    );
    return redirect()->route('SuperAdminUsers')->with($notification);
  }
  else{
    $notification=array(
      'message'=>'Successfully inserted data',
      'alert-type'=>'success'
    );
    return redirect()->route('SuperAdminUsers')->with($notification);
     }
  }
  public function viewusers(Request $request)
  {
    $usersregistration = DB::table('usersregistration')
       ->join('userscategories','usersregistration.users_id','userscategories.id')
       ->select('usersregistration.*','userscategories.name')
       ->get();
    return view('SuperAdmin.usersregistration.viewusers',compact('usersregistration'));
  }
  public function editusers($id)
  {
    $userscategories=DB::table('userscategories')->get();
    $usersregistration=DB::table('usersregistration')->where('id',$id)->first();
    return view('SuperAdmin.usersregistration.editusers',compact('userscategories','usersregistration'));
  }
  public function updateusers(Request $request,$id)
  {
    $validatedData = $request->validate([
    'username'=>'max:25',
    'email' => 'email',
    'mobile_number' => 'min:6|max:13|regex:/^([0-9\s\-\+\(\)]*)$/',
    'password' => 'min:8|confirmed',
    'address'=>'max:3000',
    'userimage'=>'mimes:png,PNG,jpg,JPG,jpeg,JPEG|max:5000'
  ]);
  $data=array();
  $data['users_id']=$request->users_id;
  $data['username']=$request->username;
  $data['email']=$request->email;
  $data['mobile_number']=$request->mobile_number;
  $data['password']=bcrypt($request->password);
  $data['address']=$request->address;
  $image = $request->file('userimage');
  if ($image) {
  $image_name=hexdec(uniqid());
  $ext=strtolower($image->getClientOriginalExtension());
  $image_full_name=$image_name.'.'.$ext;
  $upload_path='images/users/';
  $image_url=$upload_path.$image_full_name;
  $success=$image->move($upload_path,$image_full_name);
  $data['userimage']=$image_url;
  unlink($request->old_photo);
  DB::table('usersregistration')->where('id',$id)->update($data);
  $notification=array(
      'message'=>'Successfully edited data',
      'alert-type'=>'success'
  );
  return redirect()->route('SuperAdminUsers')->with($notification);
  }
  else{
    $data['userimage']=$request->old_photo;
    DB::table('usersregistration')->where('id',$id)->update($data);
  $notification=array(
    'message'=>'Successfully edited data',
    'alert-type'=>'success'
  );
  return redirect()->route('SuperAdminUsers')->with($notification);
       }

   }
   public function deleteusers($id)
   {
     $usersregistration=DB::table('usersregistration')->where('id',$id)->first();
    $image=$usersregistration->userimage;

  $delete=DB::table('usersregistration')->where('id',$id)->delete();
            if ($delete) {
              unlink($image);
              $notification=array(
                'message'=>'Successfully Deleted!',
                'alert-type'=>'success'
              );
              return redirect()->back()->with($notification);
            }else{
              $notification=array(
                'message'=>'Something wrong!',
                'alert-type'=>'error'
              );
              return redirect()->back()->with($notification);
            }
    }



}
