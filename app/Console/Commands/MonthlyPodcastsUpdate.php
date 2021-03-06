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
        foreach ($upcoming as $upcmng) {
            $saved = 0;
            $oldPodcastId = 0;

            try {

                $feed = simplexml_load_file($upcmng->feed, 'SimpleXMLElement');

                // $xml = simplexml_load_file($file, null, LIBXML_NOERROR);

                if ($feed === false) {
                    echo "Algo deu errado ao abrir o arquivo! :(";
                    continue;
                }

                // Check if this Podcast was added previously
                if ($upcmng->status == 0) {
                    echo "\nWelcome to the jungle!\n";

                    // Add Podcast
                    $newPodcast = new Podcast([
                        'artistName' => $feed->channel->children("itunes", true)->author != null ? $feed->channel->children("itunes", true)->author : "not found",
                        'title'=>$feed->channel->title,
                        'description'=> $feed->channel->description,
                        'link'=> $feed->channel->link,
                        'feed'=> $feed->channel->children("atom", true)->link ? $feed->channel->children("atom", true)->link->attributes() : "not found",
                        'artwork' => $feed->channel->children("itunes", true)->image ? $feed->channel->children("itunes", true)->image->attributes() : "not found", // Some podcasts use better images for itunes
                        'copyright' => $feed->channel->copyright
                    ]);

                    $saved = $newPodcast->save();

                } else {
                    echo "\nUpdating an old buddie!\n";

                    $urlFeed = preg_replace("(^https?://)", "", $upcmng->feed);
                    $oldPodcastId = Podcast::where('feed', '=', "https://" . $urlFeed)->orWhere('feed', '=', "http://" . $urlFeed)->value('id');
                }

                // Check if the new podcast was added or retrieved from database
                if ($saved == 1 || $oldPodcastId > 0) {
                    // Episodes
                    foreach ($feed->channel->item as $item) {
                        $urlLink = preg_replace("(^https?://)", "", $item->link);
                        $ep = Episode::where('link', "https://" . $urlLink)->orWhere('link', "http://" . $urlLink)->count();

                        // Check if the episode is already in database
                        if ($ep > 0) {
                            // Skip to the next iteration
                            echo "Whoops! It's already in database! :)\n";
                            continue;
                        }

                        // Add Episode
                        $episode = new Episode ([
                            'title' => $item->title,
                            'description' => $item->description,
                            'releaseDate' => new \DateTime(date('Y-m-d', strtotime($item->pubDate))),
                            'duration' => $item->children("itunes", true)->duration ? $item->children("itunes", true)->duration : "not found",
                            'link' => $item->link,
                            'audioFile' => $item->enclosure['url'] != null ? $item->enclosure['url'] : "not found",
                            'length' => $item->enclosure['length'] != null ? (preg_match('/^[0-9]+$/i', $item->enclosure['length']) ? $item->enclosure['length'] : 0) : 0,
                            'audioFileType' => $item->enclosure['type'] != null ? $item->enclosure['type'] : "not found",
                            'podcastId' => $saved == 1 ? $newPodcast->id : $oldPodcastId
                        ]);

                        $episode->save();
                    }

                    if (!$oldPodcastId > 0) {
                        // Update upcoming from Not Added to Added
                        $welcome = Upcoming::find($upcmng->id);

                        $welcome->status = 1;
                        $welcome->status_desc = "Added";

                        $welcome->save();
                    }

                    echo "Done! :D\n\n";
                }

            } catch (Exception $e) {
                echo $e;
                continue;
            }

        }

    }

    private function update() {

    }
}
