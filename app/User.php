<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','roles'
    ];
    public static function boot(){
        parent::boot();
        static::created(function($model){
 
            $user= User::first();
            // $admins = User::all()->filter(function($user){
            //     return $user->roles=='admin';
            // });
            // Notification::send($admins, new UserRegistered($model));
            
            //return redirect('/');
        });
   }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function group(){
        return $this->belongTo(Group::class);
    }
    public function assignments(){
        return $this->belongsToMany(Assignment::class);
    }
}
