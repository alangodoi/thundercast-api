<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    protected $fillable = [
        'title',
        'description',
        'releaseDate',
        'link',
        'audioFile',
        'length',
        'audioFileType',
        'podcastId'
    ];
}
