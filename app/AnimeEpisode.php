<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnimeEpisode extends Model
{


    protected $fillable = ['tmdb_id', 'episode_number', 'name', 'overview', 'still_path', 'vote_average', 'vote_count', 'air_date','hasrecap','skiprecap_start_in'];

    protected $with = ['videos', 'substitles','downloads'];

    
    protected $casts = [
        'hasrecap' => 'int',
        'skiprecap_start_in' => 'int'


    ];
    

    public function season()
    {

        return $this->belongsTo(AnimeSeason::class, 'season_id');
    }

    public function videos()
    {
        return $this->hasMany('App\AnimeVideo');
    }


    public function downloads()
    {
        return $this->hasMany('App\AnimeDownload');
    }

    public function substitles()
    {
        return $this->hasMany('App\AnimeSubstitle');
    }
}
