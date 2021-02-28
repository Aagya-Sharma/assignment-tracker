<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    public function assignments()
    {
        return $this->hasmany(Assignment::class);
    }
    public function users(){
        return $this->hasMany(User::class);
    }
}
