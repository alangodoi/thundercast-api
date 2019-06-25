<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Podcast;
use App\Episode;

class PodcastController extends Controller
{
    public function insertPodcast(Request $request) {

    }

    public function podcasts() {
        Return Podcast::all();
    }

    public function episodes(Request $request) {
        $query = Episode::query();
        $episodes = $query->where('podcastId', '=', $request->podcastId)->get();
        // Return Podcast::where('podcastId', '=', $request->podcastId);

        return response()->json($episodes);
    }
}
