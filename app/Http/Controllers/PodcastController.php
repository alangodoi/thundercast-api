<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Podcast;

class PodcastController extends Controller
{
    public function insertPodcast(Request $request) {

    }

    public function podcasts() {
        Return Podcast::all();
    }
}
