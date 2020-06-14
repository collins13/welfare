<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function courses()
    {
        return $this->hasMany('App\Course');
    }

    public function donates()
    {
        return $this->hasMany('App\Donate');
    }
}
