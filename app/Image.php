<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'images';

    // Realacion one to Many / de uno a muchos

    public function comment()
    {
        return $this->hasMany('App\Comment')->orderBy('id', 'desc');
    }

    // Realacion one to Many / de uno a muchos

    public function like()
    {
        return $this->hasMany('App\Like');
    }

    // Muchos a uno
    public function user()
    {
        return $this->belongsTo('App\user', 'user_id');
    }
}
