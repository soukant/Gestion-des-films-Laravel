<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use ChristianKuri\LaravelFavorite\Traits\Favoriteable;
use App\Http\ClearsResponseCache;

class Serie extends Model
{


    use Favoriteable,ClearsResponseCache;

    protected $fillable = ['tmdb_id', 'name', 'overview', 'poster_path', 'backdrop_path', 'preview_path', 'vote_average',
     'vote_count', 'popularity','featured', 'premuim','active','views', 'first_air_date', 'tv','pinned','newEpisodes','imdb_external_id','original_name'
    ,'trailer_url'];

    protected $with = ['genres', 'seasons','networks'];

    protected $appends = ['genreslist','casterslist','networkslist'];

    protected $casts = [
        'status' => 'int',
        'premuim' => 'int',
        'active' => 'int',
        'featured' => 'int',
        'pinned' => 'int',
        'newEpisodes' => 'int'
     
    ];



    public function casters()
    {
        return $this->hasMany('App\SerieCast');
    }



    public function networks()
    {
        return $this->hasMany('App\SerieNetwork');
    }


    public function genres()
    {
        return $this->hasMany('App\SerieGenre');
    }

    public function seasons()
    {
        return $this->hasMany('App\Season')->orderBy('season_number');
    }



    public function getCasterslistAttribute()
    {
        $casters = [];
        foreach ($this->casters as $caster) {
            array_push($casters, $caster->cast);
        }
        return $casters;
    }



    public function getNetworkslistAttribute()
    {
        $networks = [];
        foreach ($this->networks as $network) {
            array_push($networks, $network->network);
        }
        return $networks;
    }



    public function getGenreslistAttribute()
    {
        $genres = [];
        foreach ($this->genres as $genre) {
            array_push($genres, $genre['name']);
        }
        return $genres;
    }
}
