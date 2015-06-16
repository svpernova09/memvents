<?php
use DMS\Service\Meetup\MeetupKeyAuthClient;
use Carbon\Carbon;
use Memvents\Event;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/test', function() {

//    $eventModel = new Event;
//    $events7 = $eventModel->getEventsWithin7Days();
//
//    dd($events7);
//

    // Key Authentication
//    $client = MeetupKeyAuthClient::factory(array('key' => env('meetup_api')));
//    $response = $client->getGroups(['group_urlname' => 'memphis-technology-user-groups']);
//    $response = $client->getEvents(['group_urlname' => 'memphis-technology-user-groups']);
//    echo "<pre>";
//    dd( $response );
//    $response = $client->getRsvps(array('event_id' => '222969071'));

//$response = \Memvents\Event::getSampleEvents();
//$events = json_decode($response, true);
//    foreach ($events['results'] as $responseItem) {
//        var_dump( $responseItem);
//    }
});