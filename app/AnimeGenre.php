<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnimeGenre extends Model
{
    protected $appends = ['name'];


    public function genre()
    {
        return $this->belongsTo('App\Genre', 'genre_id');
    }

    public function anime()
    {
        return $this->belongsTo('App\Anime', 'anime_id');
    }

    public function getNameAttribute()
    {
        return $this->genre->name;
    }
}
