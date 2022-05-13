<?php

use App\Models\MediaType;
use App\Models\Rating;
use App\Models\OmdbInfo;
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
        Schema::create('media', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(MediaType::class, 'type_id')->nullable();
            $table->foreignIdFor(Rating::class, 'rating_ebert')->nullable();
            $table->foreignIdFor(OmdbInfo::class, 'omdb_info')->nullable();
            $table->string('name');
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
        Schema::dropIfExists('media');
    }
};
