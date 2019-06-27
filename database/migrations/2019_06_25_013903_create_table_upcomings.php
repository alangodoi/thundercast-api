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
                'feed' => 'http://rss.art19.com/the-daily',
                'status' => 0,
                'status_desc' => 'not added'
            )
         );

         DB::table('upcomings')->insert(
            array(
                'feed' => 'https://www.kcrw.com/news/shows/left-right-center/rss.xml',
                'status' => 0,
                'status_desc' => 'not added'
            )
         );

         DB::table('upcomings')->insert(
            array(
                'feed' => 'https://www.democracynow.org/podcast.xml',
                'status' => 0,
                'status_desc' => 'not added'
            )
         );

        //  Node no longer exists
         DB::table('upcomings')->insert(
            array(
                'feed' => 'http://feeds.wnyc.org/takeawaypodcast',
                'status' => 0,
                'status_desc' => 'not added'
            )
         );

         DB::table('upcomings')->insert(
            array(
                'feed' => 'https://feeds.megaphone.fm/thechernobylpodcast',
                'status' => 0,
                'status_desc' => 'not added'
            )
         );

         DB::table('upcomings')->insert(
            array(
                'feed' => 'http://feeds.revealradio.org/revealpodcast',
                'status' => 0,
                'status_desc' => 'not added'
            )
         );

         DB::table('upcomings')->insert(
            array(
                'feed' => 'http://feeds.feedburner.com/TheTerryProjectPodcast',
                'status' => 0,
                'status_desc' => 'not added'
            )
         );

         DB::table('upcomings')->insert(
            array(
                'feed' => 'http://audioboom.com/channels/3709182.rss',
                'status' => 0,
                'status_desc' => 'not added'
            )
         );

        DB::table('upcomings')->insert(
            array(
                'feed' => 'http://hipsters.tech/feed/podcast/',
                'status' => 0,
                'status_desc' => 'not added'
            )
         );

         DB::table('upcomings')->insert(
            array(
                'feed' => 'https://oprimorico.com.br/category/podcast/feed/',
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
