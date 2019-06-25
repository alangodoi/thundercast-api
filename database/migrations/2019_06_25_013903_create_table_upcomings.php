<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableUpcomings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('upcomings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('feed');
            $table->integer('status');
            $table->string('status_desc');
            $table->timestamps();
        });

        // Insere Podcast
        DB::table('upcomings')->insert(
            array(
                'feed' => 'http://hipsters.tech/feed/podcast/',
                'status' => 0,
                'status_desc' => 'not added'
            )
         );

         DB::table('upcomings')->insert(
            array(
                'feed' => 'https://oprimorico.com.br/feed/',
                'status' => 0,
                'status_desc' => 'not added'
            )
         );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('upcomings');
    }
}
