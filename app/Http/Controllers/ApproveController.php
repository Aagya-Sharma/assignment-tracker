<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Group;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ApproveController extends Controller
{
    public function approve(Request $request,$id)
    {
       
        $user = User::find($id);
        $user->active = '1';
        $user->roles = $request->roles;
        
        //DB::update('update users set  roles = :roles and active = :active where id = :id', ['active' =>'1','roles'=>$request->roles ,'id' => $id]);
        $user->save();
        return redirect('/dashboard');
    }
   
    public function userslist()
    {
        $teachers = DB::table('users')
        ->where('active', '=', 1)
        ->where('email','!=',Auth::user()->email)
        ->where('roles','=','teacher')
        ->orderBy('name')
        ->get();
        $students = DB::table('users')
        ->where('active', '=', 1)
        ->where('email','!=',Auth::user()->email)
        ->where('roles','=','student')
        ->orderBy('name')
        ->get();

        $classes = Group::all();
     

     
        return view('admin.usersList',compact('teachers','classes','students'));
    }
    public function classedit(Request $request,$id)
    {
        $user = User::find($id);
        
        $user->class = $request->class;
        $classname = $request->class;
        $group= DB::table('groups')
        ->where('classname','=',$classname)
        ->first();

        
        $user->class_id = $group->id;
        //return $user;
        $user->save();
        return redirect('/dashboard');
         
    }
}



