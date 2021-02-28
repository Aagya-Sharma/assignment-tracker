<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }
    public function dashboard()
    {
        
        $users = User::where('active', '!=', '1')->get();

        return view('admin.dashboard',compact('users'));
    }
}
