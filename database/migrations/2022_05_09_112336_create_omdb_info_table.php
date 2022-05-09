<?php

use App\Models\Media;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('omdb_info', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Media::class, 'media_id');
            $table->string("title");
            $table->string("year");
            $table->string("rated");
            $table->string("released");
            $table->string("runtime");
            $table->string("genre");
            $table->string("director");
            $table->string("writer");
            $table->string("actors");
            $table->string("plot");
            $table->string("language");
            $table->string("country");
            $table->string("awards");
            $table->string("poster");
            $table->string("rotten_tomatoes_rating")->nullable();
            $table->string("metacritic_rating")->nullable();
            $table->string("metascore")->nullable();
            $table->string("imdb_rating");
            $table->string("imdb_votes");
            $table->string("imdb_id");
            $table->string("type");
            $table->string("dvd")->nullable();
            $table->string("box_office")->nullable();
            $table->string("production");
            $table->string("website");
            $table->string("response");
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
        Schema::dropIfExists('omdb_info');
    }
};
