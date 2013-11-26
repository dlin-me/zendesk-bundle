<?php
namespace Dlin\Bundle\ZendeskBundle\Tests\Dlin\Bundle\ZendeskBundle;

use Dlin\Bundle\ZendeskBundle\Service\ZendeskService;

class ZendeskServiceTest extends \PHPUnit_Framework_TestCase{


    public function testGetCollectionName()
    {
        $service = new ZendeskService('email','token','url');

        $this->assertEquals('email', $service->getApi()->getEmailAddress());
        $this->assertEquals('token', $service->getApi()->getApiToken());
        $this->assertEquals('url', $service->getApi()->getApiUrl());

    }

}



