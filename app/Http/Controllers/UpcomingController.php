<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Upcoming;

class UpcomingController extends Controller
{
    public function upcomings(){
        return Upcoming::all();
    }
}
