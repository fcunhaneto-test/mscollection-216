<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCastMovieTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cast_movie', function (Blueprint $table) {
            $table->unsignedInteger('cast_id');
            $table->unsignedInteger('movie_id');
            $table->unsignedTinyInteger('order')->default(1);
            $table->softDeletes();

            $table->primary(['cast_id', 'movie_id']);

            $table->foreign('cast_id')->on('cast')->references('id')
                ->onDelete('cascade');
            $table->foreign('movie_id')->on('movies')->references('id')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cast_movie');
    }
}
