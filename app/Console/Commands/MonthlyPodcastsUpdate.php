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

        header ("Content-Type:text/xml");
        foreach ($upcoming as $upcoming) {

            try {

                $feed = simplexml_load_file($upcoming->feed, 'SimpleXMLElement');

                // Podcast
                $podcast = new Podcast([
                    'artistName' => $feed->channel->children("itunes", true)->author,
                    'title'=>$feed->channel->title,
                    'description'=> $feed->channel->description,
                    'link'=> $feed->channel->link,
                    'feed'=> $feed->channel->children("atom", true)->link->attributes(),
                    'artwork' => $feed->channel->children("itunes", true)->image->attributes(), // Some podcasts use better images for itunes
                    'copyright' => $feed->channel->copyright
                ]);

                if ($podcast->save() == 1) {
                    // Episodes
                    foreach ($feed->channel->item as $item) {
                        $episode = new Episode ([
                            'title' => $item->title,
                            'description' => $item->description,
                            // 'releaseDate' => date("Y-d-m", strtotime($item->pubDate)),
                            'releaseDate' => '2019-05-05',
                            'link' => $item->link,
                            'audioFile' => $item->enclosure['url'] != null ? $item->enclosure['url'] : "not found",
                            'length' => $item->enclosure['length'] != null ? $item->enclosure['length'] : 0,
                            'audioFileType' => $item->enclosure['type'] != null ? $item->enclosure['type'] : "not found",
                            'podcastId' => $podcast->id
                        ]);

                        $episode->save();
                        echo "EPISODE\n";
                        echo $episode->id."\n";
                    }

                    $welcome = Upcoming::find($upcoming->id);

                    $welcome->status = 1;
                    $welcome->status_desc = "Added";

                    $welcome->save();
                }

            } catch (Exception $e) {
                echo $e;
            }

        }

    }
}
