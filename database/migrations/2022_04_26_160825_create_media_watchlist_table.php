<?php

use App\Models\Media;
use App\Models\Watchlist;
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
        Schema::create('media_watchlist', function (Blueprint $table) {
            $table->foreignIdFor(Media::class);
            $table->foreignIdFor(Watchlist::class);
            $table->boolean('watched')->default(false);
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
        Schema::dropIfExists('media_watchlist');
    }
};
