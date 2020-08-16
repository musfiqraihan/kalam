<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ImageController extends Controller
{
  public function addimage()
  {
    return view('images.addimage');
  }
  public function storeimage(Request $request)
  {
    $validatedData = $request->validate([
    'name' => 'required',
    'image1'=>'required|mimes:png,PNG,jpg,JPG,jpeg,JPEG|max:5000',
    'image2'=>'required|mimes:png,PNG,jpg,JPG,jpeg,JPEG|max:5000',
    'image3'=>'required|mimes:png,PNG,jpg,JPG,jpeg,JPEG|max:5000',
    'image4'=>'required|mimes:png,PNG,jpg,JPG,jpeg,JPEG|max:5000',
    'image5'=>'required|mimes:png,PNG,jpg,JPG,jpeg,JPEG|max:5000',
  ]);
  $data=array();
  $data['name']= $request->name;
  $image1 = $request->file('image1');
  $image2 = $request->file('image2');
  $image3 = $request->file('image3');
  $image4 = $request->file('image4');
  $image5 = $request->file('image5');
    if ($image1 || $image2 || $image3 || $image4 || $image5) {
      $image_name1=hexdec(uniqid());
      $image_name2=hexdec(uniqid());
      $image_name3=hexdec(uniqid());
      $image_name4=hexdec(uniqid());
      $image_name5=hexdec(uniqid());
      $ext1=strtolower($image1->getClientOriginalExtension());
      $ext2=strtolower($image2->getClientOriginalExtension());
      $ext3=strtolower($image3->getClientOriginalExtension());
      $ext4=strtolower($image4->getClientOriginalExtension());
      $ext5=strtolower($image5->getClientOriginalExtension());
      $image_full_name1=$image_name1.'.'.$ext1;
      $image_full_name2=$image_name2.'.'.$ext2;
      $image_full_name3=$image_name3.'.'.$ext3;
      $image_full_name4=$image_name4.'.'.$ext4;
      $image_full_name5=$image_name5.'.'.$ext5;
      $upload_path='images/';
      $image_url1=$upload_path.$image_full_name1;
      $image_url2=$upload_path.$image_full_name2;
      $image_url3=$upload_path.$image_full_name3;
      $image_url4=$upload_path.$image_full_name4;
      $image_url5=$upload_path.$image_full_name5;
      $success1=$image1->move($upload_path,$image_full_name1);
      $success2=$image2->move($upload_path,$image_full_name2);
      $success3=$image3->move($upload_path,$image_full_name3);
      $success4=$image4->move($upload_path,$image_full_name4);
      $success5=$image5->move($upload_path,$image_full_name5);
      $data['image1']=$image_url1;
      $data['image2']=$image_url2;
      $data['image3']=$image_url3;
      $data['image4']=$image_url4;
      $data['image5']=$image_url5;
      DB::table('images')->insert($data);
      return redirect()->back()->with('success','Inserted Successfully!');
    }
    else{
      DB::table('images')->insert($data);
      return redirect()->back()->with('success','Inserted Successfully!');
    }
  }
  public function showimage()
  {
    $images = DB::table('images')->get();
    return view('images.showimage',compact('images'));
  }

  public function editimage($id)
  {
    $images=DB::table('images')->where('id',$id)->first();
    return view('images.editimage',compact('images'));
  }

  public function updateimage(Request $request)
  {
    $validatedData = $request->validate([
    'name' => 'string',
    'image1'=>'mimes:png,PNG,jpg,JPG,jpeg,JPEG|max:5000',
    'image2'=>'mimes:png,PNG,jpg,JPG,jpeg,JPEG|max:5000',
    'image3'=>'mimes:png,PNG,jpg,JPG,jpeg,JPEG|max:5000',
    'image4'=>'mimes:png,PNG,jpg,JPG,jpeg,JPEG|max:5000',
    'image5'=>'mimes:png,PNG,jpg,JPG,jpeg,JPEG|max:5000',
  ]);
  $data=array();
  $data['name']= $request->name;
  $image1 = $request->file('image1');
  $image2 = $request->file('image2');
  $image3 = $request->file('image3');
  $image4 = $request->file('image4');
  $image5 = $request->file('image5');
    if ($image1 || $image2 || $image3 || $image4 || $image5) {
      $image_name1=hexdec(uniqid());
      $image_name2=hexdec(uniqid());
      $image_name3=hexdec(uniqid());
      $image_name4=hexdec(uniqid());
      $image_name5=hexdec(uniqid());
      $ext1=strtolower($image1->getClientOriginalExtension());
      $ext2=strtolower($image2->getClientOriginalExtension());
      $ext3=strtolower($image3->getClientOriginalExtension());
      $ext4=strtolower($image4->getClientOriginalExtension());
      $ext5=strtolower($image5->getClientOriginalExtension());
      $image_full_name1=$image_name1.'.'.$ext1;
      $image_full_name2=$image_name2.'.'.$ext2;
      $image_full_name3=$image_name3.'.'.$ext3;
      $image_full_name4=$image_name4.'.'.$ext4;
      $image_full_name5=$image_name5.'.'.$ext5;
      $upload_path='images/';
      $image_url1=$upload_path.$image_full_name1;
      $image_url2=$upload_path.$image_full_name2;
      $image_url3=$upload_path.$image_full_name3;
      $image_url4=$upload_path.$image_full_name4;
      $image_url5=$upload_path.$image_full_name5;
      $success1=$image1->move($upload_path,$image_full_name1);
      $success2=$image2->move($upload_path,$image_full_name2);
      $success3=$image3->move($upload_path,$image_full_name3);
      $success4=$image4->move($upload_path,$image_full_name4);
      $success5=$image5->move($upload_path,$image_full_name5);
      $data['image1']=$image_url1;
      $data['image2']=$image_url2;
      $data['image3']=$image_url3;
      $data['image4']=$image_url4;
      $data['image5']=$image_url5;
      unlink($request->old_photo1);
      unlink($request->old_photo2);
      unlink($request->old_photo3);
      unlink($request->old_photo4);
      unlink($request->old_photo5);
      DB::table('images')->update($data);
      return redirect()->route('show.image')->with('success','Updated Successfully!');
  }
  else{
     $data['image1']=$request->old_photo1;
     $data['image2']=$request->old_photo2;
     $data['image3']=$request->old_photo3;
     $data['image4']=$request->old_photo4;
     $data['image5']=$request->old_photo5;
    DB::table('images')->update($data);
    return redirect()->route('show.image')->with('success','Updated Successfully!');
    }

 }

  public function deleteimage($id)
         {
         $images=DB::table('images')->where('id',$id)->first();
         $image1=$images->image1;
         $image2=$images->image2;
         $image3=$images->image3;
         $image4=$images->image4;
         $image5=$images->image5;

         $delete=DB::table('images')->where('id',$id)->delete();
         if ($delete) {
           unlink($image1);
           unlink($image2);
           unlink($image3);
           unlink($image4);
           unlink($image5);
      return redirect()->back();
         }
         else{
           return redirect()->back();
         }
    }

}
