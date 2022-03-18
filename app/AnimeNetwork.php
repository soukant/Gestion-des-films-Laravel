<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnimeNetwork extends Model
{
    protected $appends = ['name'];


    public function network()
    {

    return $this->belongsTo('App\Network', 'network_id');

    }

    public function serie()
    {
        return $this->belongsTo('App\Anime', 'anime_id');
    }

    public function getNameAttribute()
    {
        return $this->network->name;
    }
}
