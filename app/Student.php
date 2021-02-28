<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public function assignments(){
        return $this->hasmany(Assignment::class);
    }
}
