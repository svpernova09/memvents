<?php
use \Memvents\Event;

class EventModelTest extends \Codeception\TestCase\Test
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    function testSavingEvent()
    {
        $event = new Event();

        $event->name = 'Meetup Name';
        $event->event_id = 'qmmzjkytjbpb';
        $event->time = '1435077000000';
        $event->status = 'upcoming';
        $event->event_url = 'http://www.meetup.com/memphis-technology-user-groups/events/222899465/';
        $event->created = '1422646230000';

        $this->assertTrue($event->save());

        $this->assertEquals('Meetup Name', $event->name);

        $this->tester->seeRecord('events', array(
            'name' => 'Meetup Name',
            'event_id' => 'qmmzjkytjbpb',
            'time' => '1435077000000',
            'status' => 'upcoming',
            'event_url' => 'http://www.meetup.com/memphis-technology-user-groups/events/222899465/',
            'created' => '1422646230000',
        ));
    }

    function testFindingEvent()
    {
        $event = new Event();

        $event->name = 'Meetup Name';
        $event->event_id = 'qmmzjkytjbpb';
        $event->time = '1435077000000';
        $event->status = 'upcoming';
        $event->event_url = 'http://www.meetup.com/memphis-technology-user-groups/events/222899465/';
        $event->created = '1422646230000';

        $event->save();
        $newEvent = Event::find($event->id);

        $this->assertTrue($newEvent instanceof Event);

    }

    function testFindingEventFailsReturnsNull()
    {
        $noEvent = Event::find(4936189634861238476123412);

        $this->assertTrue(is_null($noEvent));
    }

    function testGetSampleDataIsJSON()
    {
        $eventModel = new Event;
        $events = $eventModel->getSampleEvents();
        json_decode($events);

        $this->assertTrue(json_last_error() == JSON_ERROR_NONE);
    }

}