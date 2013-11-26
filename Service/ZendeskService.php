<?php


namespace Dlin\Bundle\ZendeskBundle\Service;




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
     * Useful for making query, for example
     *
     * @return \Dlin\Zendesk\ZendeskAPI
     *
     */
    public function getClient(){
        return $this->client;
    }




}