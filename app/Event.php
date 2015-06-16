<?php

namespace Memvents;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
class Event extends Model
{

    protected $table = 'events';

    protected $fillable = [
        'name',
        'event_id',
        'time',
        'status',
        'event_url',
        'created'
    ];

    public function getSampleEvents()
    {
        return Storage::get('sample_events.json');
    }
}
