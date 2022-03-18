<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnimeEpisodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anime_episodes', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->integer('tmdb_id')->unsigned()->unique()->nullable();
            $table->bigInteger('anime_season_id')->unsigned();
            $table->integer('episode_number')->unsigned();
            $table->string('name');
            $table->text('overview')->nullable();
            $table->string('still_path')->nullable();
            $table->float('vote_average')->unsigned()->default(0);
            $table->float('vote_count')->unsigned()->nullable();
            $table->integer('views')->unsigned()->default(0);
            $table->date('air_date')->nullable();
            $table->boolean('skiprecap_start_in')->default(0);
            $table->boolean('hasrecap')->default(0);
            $table->foreign('anime_season_id')->references('id')->on('anime_seasons')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('anime_episodes');
    }
}
