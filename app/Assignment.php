<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    public function group()
    {
        return $this->belongsTo(Group::class);
    }
    public function User()
    {
        return $this->belongsToMany(User::class);
    }
    public function Student()
    {
        return $this->belongsTo(Student::class);
    }
}
