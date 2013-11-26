<?php


namespace Dlin\Bundle\ZendeskBundle\Service;



use Dlin\Zendesk\ZendeskApi;

class ZendeskService
{

    /**
     * @var  \Dlin\Zendesk\ZendeskApi
     */
    private $api;

    /**
     * Constructor
     *
     * @inheritdoc
     */
    public function __construct($email, $token, $url)
    {


        $this->api = new ZendeskApi($email, $token, $url);
    }


    /**
     *
     * This return the initialized client.
     *
     * @return \Dlin\Zendesk\ZendeskApi
     *
     */
    public function getApi(){
        return $this->api;
    }




}