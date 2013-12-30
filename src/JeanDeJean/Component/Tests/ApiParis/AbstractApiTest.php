<?php

namespace JeanDeJean\Component\Tests\ApiParis;

use JeanDeJean\Component\ApiParis\ApiQueFaire,
    JeanDeJean\Component\ApiParis\ApiClient;

use Monolog\Logger;


/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AbstractApi
 *
 * @author nicolas
 */
class AbstractApiTest extends \PHPUnit_Framework_TestCase
{

  /**
   *
   * @var ApiClient 
   */
  private $client;
  
  /**
   *
   * @var ApiQueFaire 
   */
  private $queFaire;

  public function setUp()
  {
    $this->config = array(
        "uri" => "https://api.paris.fr:3000/data/",
        "token" => "",
    );

    $logger = new Logger('unit_test');
    $this->client = new ApiClient($this->config["uri"], $this->config["token"], $logger, $debug = true);
    $this->queFaire = new ApiQueFaire($this->client);
  }

  public function testInitServiceCallable()
  {
    $this->queFaire->initServiceCallable("getCategories");
    $this->assertEquals($this->queFaire->getClient()->getServiceName(), "get_categories");
    $this->queFaire->initServiceCallable("getActivities");
    $this->assertEquals($this->queFaire->getClient()->getServiceName(), "get_activities");
    $this->queFaire->initServiceCallable("searchActivities");
    $this->assertEquals($this->queFaire->getClient()->getServiceName(), "search_activities");
    $this->queFaire->initServiceCallable("getGeoActivities");
    $this->assertEquals($this->queFaire->getClient()->getServiceName(), "get_geo_activities");
  }

}
