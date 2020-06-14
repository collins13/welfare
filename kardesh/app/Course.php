<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public function categories()
    {
        return $this->belongsTo('App\Category','course_id', 'id');
    }
}
