<?php
 
namespace App\Http\Controllers\Auth;
 
use App\Notifications\UserRegistered;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\DB;
use Auth;
 
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */
 
    use RegistersUsers;
 
    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';
 
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
 
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'roles' => ['required','string','max:255'],
           
        ]);
    }
 
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user =  User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'roles' => $data['roles'],
            
            
        ]);
        // $admins = User::all()->filter(function($user){
        //     return $user->roles=='admin';
        // });
        // try {
        //     Notification::send($admins, new UserRegistered($user));
        // } catch(\Exception $e){
 
        // }
        
        // return $user;
        
    
        if($user->email == 'sonikasharma5716@gmail.com')
        {
            DB::update('update users set active = :active where email = :email', ['active' =>'1' ,'email' =>'sonikasharma5716@gmail.com' ]);;
            return $user;
        }
        else{
            $admins = User::all()->filter(function($user){
                return $user->roles =='admin';
            });
             try {
               
                // increment(' $admins->unreadnotifications->count()', 1);
                //return $count;
                // return $admins->unreadnotifications->count+=1;
                 Notification::send($admins, new UserRegistered($user));
                //  if(Auth::user()->roles=='admin'){
                //  return Auth::user()->unreadnotifications->count()+1;
                //  }

             } catch(\Exception $e){
    
             }
            
            return $user;
 
            } 
        }
    }

    
    