<?php

namespace Memvents;

use Illuminate\Database\Eloquent\Model;

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
}
