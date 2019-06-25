<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use GuzzleHttp\Client;
use App\Upcoming;
use App\Podcast;
use App\Episode;

class MonthlyPodcastsUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'podcast:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update Podcasts From Upcoming\'s Table';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $upcoming = Upcoming::all();

        foreach ($upcoming as $podcast) {
            $savedPodcast = 0;
            $feed = simplexml_load_file($podcast->feed);

            // Podcast
            $podcast = new Podcast([
                'artistName' => $feed->channel->children("itunes", true)->author,
                'title'=>$feed->channel->title,
                'description'=> $feed->channel->description,
                'link'=> $feed->channel->link,
                'feed'=> $feed->channel->children("atom", true)->link->attributes(),
                'artwork'=> $feed->channel->image->url,
                'copyright' => $feed->channel->copyright
            ]);

            $savedPodcast = $podcast->save();
            echo "PODCAST\n";
            echo $podcast->id;

            // Episodes
            foreach ($feed->channel->item as $item) {
                $episode = new Episode ([
                    'title' => $item->title,
                    'description' => $item->description,
                    'releaseDate' => $item->pubDate,
                    'link' => $item->link,
                    'audioFile' => $item->enclosure['url'],
                    'length' => $item->enclosure['length'],
                    'audioFileType' => $item->enclosure['type'],
                    'podcastId' => $podcast->id
                ]);

                $episode->save();
                echo "EPISODES\n";
                echo $episode->id."\n";
            }
        }

    }
}
