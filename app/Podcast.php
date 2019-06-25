<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Podcast extends Model
{
    protected $fillable = [
        'artistName',
        'title',
        'description',
        'link',
        'feed',
        'artwork',
        'copyright'
    ];
}
