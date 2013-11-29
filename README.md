Dlin Symfony Zendesk Bundle
=========

Dlin Zendesk Bundle is Symfony2 wrapper bundle for the 'Dlin-Zendesk' PHP library:


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
        email: account@youemail.com
        token: xxxxxxxxxxx
        url: https://subdomain.zendesk.com/api/v2/


Usage
--------------

Geting the service in a controller

    $api =  $this->get('dlin.zendesk')->getApi();

Getting the service in a ContainerAwareService

    $api = $this->container->get('dlin.zendesk')->getApi();


Using the service
   
    //Get recent tickets
    $response = $api->get('tickets/recent.json')->send()->json();



Using ticket Resource Mapping Classes

    //Instantiate the Ticket Client
    $ticketClient = new TicketClient($api);


    //Query a ticket by ID
    $ticket = $ticketClient->getOneById(123);



For more details, please refer to the [dlin-zendesk](https://github.com/dlin-me/zendesk) library.



License
-

MIT

*Free Software, Yeah!*


