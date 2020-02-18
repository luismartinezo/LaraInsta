<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';

    // Muchos a uno
    public function user()
    {
        return $this->belongsTo('App\user', 'user_id')
    }
     // Muchos a uno
     public function image()
     {
         return $this->belongsTo('App\image', 'image_id')
     }
}
