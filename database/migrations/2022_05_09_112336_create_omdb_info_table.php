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
            $table->string("Title");
            $table->string("Year");
            $table->string("Rated");
            $table->string("Released");
            $table->string("Runtime");
            $table->string("Genre");
            $table->string("Director");
            $table->string("Writer");
            $table->string("Actors");
            $table->string("Plot");
            $table->string("Language");
            $table->string("Country");
            $table->string("Awards");
            $table->string("Poster");
            $table->string("rottenTomatoesRating")->nullable();
            $table->string("metacriticRating")->nullable();
            $table->string("Metascore")->nullable();
            $table->string("imdbRating");
            $table->string("imdbVotes");
            $table->string("imdbID");
            $table->string("Type");
            $table->string("DVD")->nullable();
            $table->string("BoxOffice")->nullable();
            $table->string("Production")->nullable();
            $table->string("Website")->nullable();
            $table->string("totalSeasons")->nullable();
            $table->string("Response");
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
