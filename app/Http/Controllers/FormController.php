<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class FormController extends Controller
{
    public function form()
    {
      $divisions = DB::table('divisions')->get();
      $districts = DB::table('districts')->get();
      $upazilas = DB::table('upazilas')->get();
      return view('forms.form',compact('divisions','districts','upazilas'));
    }
    public function getdistricts($id)
  {
    $districts = DB::table('districts')
    ->where('division_id',$id)
    ->pluck("name","id");
    return json_encode($districts);
  }
  public function getupazilas($id)
  {
    $upazilas = DB::table('upazilas')
    ->where('district_id',$id)
    ->pluck("name","id");
    return json_encode($upazilas);
  }

}
