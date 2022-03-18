<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MovieCast extends Model
{
    protected $appends = ['name'];



    public function cast()
    {
        return $this->belongsTo('App\Cast', 'cast_id');
    }

    public function movie()
    {
        return $this->belongsTo('App\Movie', 'movie_id');
    }

    public function getNameAttribute()
    {
        return $this->cast->name;
    }

}
