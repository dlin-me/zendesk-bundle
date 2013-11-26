<?php
namespace Dlin\Bundle\ZendeskBundle\Test\Dlin\Bundle\ZendeskBundle;

use Dlin\Bundle\ZendeskBundle\Service\ZendeskService;

class KeenServiceTest extends \PHPUnit_Framework_TestCase{


    public function testGetCollectionName()
    {
        $service = new ZendeskService('project','write','read');

        $this->assertEquals('keenServiceTest', $service->getCollectionName($this));
        $this->assertEquals('MyName', $service->getCollectionName($this,'MyName'));

        $this->assertEquals('TestMe', $service->getCollectionName(new MyTest()));



    }


    public function testGetVars()
    {
        $data = get_object_vars(new MyTest());
        $this->assertEquals('value1', $data['p1']);
        $this->assertArrayHasKey('p2', $data);
        $this->assertArrayNotHasKey('p3', $data);
        $this->assertArrayNotHasKey('p4', $data);

    }


    public function testSchedule()
    {
        $service = new ZendeskService('project','write','read');

        $service->scheduleEventObject(new MyTest());

        $events = $service->getScheduledEvents('TestMe');

        $this->assertEquals(1, count($events));

        $this->assertEquals('value2', $events[0]['p2']);

        $service->scheduleEvent('TestEvent2', array('hoho'=>2));
        $service->scheduleEvent('TestEvent2', array('hoho'=>3));

        $events = $service->getScheduledEvents('TestEvent2');

        $this->assertEquals(2, count($events));

        $this->assertEquals(2, $events[0]['hoho']);

        $service->cancelScheduledEvents('TestEvent2');



        $events = $service->getScheduledEvents('TestEvent2');

        $this->assertEquals(0, count($events));

        $events = $service->getScheduledEvents('TestMe');

        $this->assertEquals(1, count($events));

        $this->assertEquals('value1', $events[0]['p1']);


    }

}

class MyTest{
    public $p1 = "value1";
    public $p2 = "value2";
    private $p3 = "p3";
    protected $p4 = 'p4';

    public function getCollectionName(){
        return 'TestMe';
    }

}