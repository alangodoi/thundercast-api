<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableEpisodes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('episodes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->longText('description');
            $table->string('duration');
            $table->date('releaseDate');
            $table->longText('link');
            $table->longText('audioFile');
            $table->bigInteger('length');
            $table->string('audioFileType');
            $table->bigInteger('podcastId')->unsigned();
            $table->timestamps();
            $table->foreign('podcastId')->references('id')->on('podcasts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('episodes');
    }
}
