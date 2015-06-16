<?php
use DMS\Service\Meetup\MeetupKeyAuthClient;
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
    // Key Authentication
//    $client = MeetupKeyAuthClient::factory(array('key' => env('meetup_api')));
//    $response = $client->getGroups(['group_urlname' => 'memphis-technology-user-groups']);
//    $response = $client->getEvents(['group_urlname' => 'memphis-technology-user-groups']);
//    echo "<pre>";
//    dd( $response );
//    $response = $client->getRsvps(array('event_id' => '222969071'));
//
//    foreach ($response as $responseItem) {
//        echo $responseItem['member']['name'] . '<br/>';
//    }
});