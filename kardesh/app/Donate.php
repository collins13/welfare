<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donate extends Model
{
    public function categories()
    {
        return $this->belongsTo('App\Category','cat_id', 'id');
    }
}
