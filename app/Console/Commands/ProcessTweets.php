<?php

namespace Memvents\Console\Commands;

use Illuminate\Console\Command;
use Memvents\Event;

class ProcessTweets extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'memvents:tweet
                            {--debug : no API calls, no DB writes}
                            ';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Look at events and determine if we should tweet.';
    protected $settings;
    protected $event;

    /**
     * @param Event $event
     */
    public function __construct(Event $event)
    {
        parent::__construct();
        $this->settings = $this->getSettings();
        $this->event = $event;

    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        dd($this->settings);

        // Get events coming in the next 7 days
        $events = $this->event->getEventsWithin7Days();

        if (count($events) > 0)
        {
            // Loop over events and check if we have tweeted @ 7 days
        }

    }

    public function getSettings()
    {
        $settings = array(
            'oauth_access_token' => env('oauth_access_token', ''),
            'oauth_access_token_secret' => env('oauth_access_token_secret', ''),
            'consumer_key' => env('consumer_key', ''),
            'consumer_secret' => env('consumer_secret', ''),
        );

        return $settings;
    }

    public function postTweet($status, $tweet_id)
    {
        $url = 'https://api.twitter.com/1.1/statuses/update.json';
        $postFields['status'] = $status;
        $postFields['in_reply_to_status_id'] = $tweet_id;

        $tweet = new TwitterAPIExchange($this->getSettings());

        if (!$this->argument('test'))
        {
            $response = $tweet->setPostfields($postFields)
                              ->buildOauth($url, 'POST')
                              ->performRequest();
        }

        if ($this->argument('test'))
        {
            $this->info('We should have tweeted: ' . $status);
        }
    }
}
