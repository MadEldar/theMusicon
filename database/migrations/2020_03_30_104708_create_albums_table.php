<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlbumsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('albums', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('album_name');
            $table->unsignedInteger('genre_id');
            $table->unsignedBigInteger('artist_id');
            $table->unsignedTinyInteger('album_status')->default(1);
            $table->unsignedTinyInteger('previous_status')->nullable();
            $table->timestamp('release_date');
            $table->string('album_thumbnail');
            $table->string('spotify_id');
            $table->timestamps();
            $table->foreign('genre_id')->references('id')->on('genres');
            $table->foreign('artist_id')->references('id')->on('artists');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('albums');
    }
}
