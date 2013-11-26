Dlin Symfony Zendesk Bundle
=========

Dlin Zendesk Bundle is Symfony2 wrapper bundle for the 'Dlin\Zendesk' PHP library:


This Zendesk Bundle provides a configurable service to work with Zendesk API



Version
--------------

0.0.1



Installation
--------------


Installation using [Composer](http://getcomposer.org/)

Add to your `composer.json`:


    json
    {
        "require" :  {
            "dlin/zendesk-bundle": "dev-master"
        }
    }


Enable the bundle in you AppKernel.php


    public function registerBundles()
    {
        $bundles = array(
        ...
        new Dlin\Bundle\ZendeskBundle\DlinZendeskBundle(),
        ...
    }


Configuration
--------------
For example:

    #app/config/config.yml

    dlin_zendesk:
        email: werknskviehraf234slf
        token: xxxxxxxxxxx
        url: xxxxxxxxx


Usage
--------------

Geting the service in a controller

    $service =  $this->get('dlin.keen_service');

Getting the service in a ContainerAwareService

    $service = $this->container->get('dlin.keen_service');

Sending an event to Zendesk.IO with data

    $eventCollectionName = "purchases";

    $eventData = array('porduct_id'=>1, 'quantity'=>2, 'amount'=>120);

    $service->fireEvent($eventCollectionName, $eventData);


Sending an event in an OOP way.


    //create an event object with public properties
    $eventObject = new MyPurchaseEvent();
    $eventObject->productId = 1;
    $eventObject->quantity = 2;
    $eventObject->amount = 120;


    $service->fireEventObject($eventObject); //this is equivalent to the last fireEvent call



    //You can defined your own event class
    Class MyPurchaseEvent{

       //Public properties will be send as event data
       public $productId;
       public $quantity;
       public $amount;

       // Procted and private properties are ignored
       protected $customerAddress;
       private $customerGender;

       //By default, the event collection name will be the class name in camelCase (e.g. myPurchaseEvent)
       //You can specify the collection name by defining a public method named 'getCollectionName'
       public function getCollectionName(){
          return 'purchases';
       }

    }



Sometimes sending event can slow down your page and affect user experience. You can schedule to fire an event only after theh current script finish execution.
This avoids slowing down the page loading.

    ...
    $service->scheduleEventObject($eventObject);
    $service->scheduleEvent('event_collection_name', array('data'=>123));
    ...

    //You can get scheduled events using collection name
    $service->getScheduledEvent('event_collection_name');

    //You can also cancel schedule events by event collection name
    $service->cancelScheduledEvents('event_collection_name');



License
-

MIT

*Free Software, Yeah!*


