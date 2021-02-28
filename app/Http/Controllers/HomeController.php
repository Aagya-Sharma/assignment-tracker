<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Group;
use Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Middleware\IsAdmin;


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
    public function classlogin()
    {
        if(empty(Auth::user()->class)){
        $groups=Group::all();
        return view('classlogin',compact('groups'));
        }
        else{
            return redirect('home');
        }

    }
    public function classloginprocess($id)
    {
        
        
       $user = Auth::user();
       $user->class_id = $id;
       $class = Group::find($id);
        //$user = User::find($userid);
       $user->class = $class->classname;
       $user->save();
       return redirect('home');
    }
    public function notification(){
        // $notifications = array('notifications' => json_decode(Auth::user()->notifications));
        // return $notifications;
        // $admin = $notifications->toArray();

     
        
        Auth::user()->unreadnotifications->markAsRead();
        
        return view('notification');
        
    }
 
 
    protected function validator(array $data)
{
    return Validator::make($data, [
        
        'roles' => 'required|string',
        // 'gender' => 'in:male,female'

    ]);
}

  
}
