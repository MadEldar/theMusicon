<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSongsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('songs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('song_name');
            $table->string('song_lyrics');
            $table->unsignedInteger('genre_id');
            $table->unsignedBigInteger('artist_id');
            $table->unsignedBigInteger('album_id');
            $table->unsignedTinyInteger('song_ordinal');
            $table->unsignedTinyInteger('song_status')->default(1);
            $table->unsignedTinyInteger('previous_status')->nullable();
            $table->string('spotify_id');
            $table->timestamp('release_date');
            $table->timestamps();
            $table->foreign('artist_id')->references('id')->on('artists');
            $table->foreign('album_id')->references('id')->on('albums');
            $table->foreign('genre_id')->references('id')->on('genres');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('songs');
    }
}
