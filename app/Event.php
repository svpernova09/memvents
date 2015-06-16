<?php

namespace Memvents;

use Carbon\Carbon;
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

    public function getEventsWithin7Days()
    {
        $now = Carbon::now()->timestamp;
        $future = Carbon::createFromTimestamp($now)->addWeeks(1)->timestamp;

        return $this->whereBetween('time', [$now, $future])
            ->where('status', 'upcoming')
            ->get();
    }

    public function getEventsWithin3Days()
    {
        $now = Carbon::now()->timestamp;
        $future = Carbon::createFromTimestamp($now)->addWeeks(3)->timestamp;

        return $this->whereBetween('time', [$now, $future])
            ->where('status', 'upcoming')
            ->get();
    }

    public function getEventsWithin24Hours()
    {
        $now = Carbon::now()->timestamp;
        $future = Carbon::createFromTimestamp($now)->addHours(24)->timestamp;

        return $this->whereBetween('time', [$now, $future])
            ->where('status', 'upcoming')
            ->get();
    }
}
