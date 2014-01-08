<?php

namespace JeanDeJean\Component\Tests\ApiParis;

use Monolog\Logger;
use JeanDeJean\Component\ApiParis\ApiClient;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ApiClient
 *
 * @author nicolas
 */
class ApiClientTest extends \PHPUnit_Framework_TestCase
{

  private $client;
  private $config;

  public function setUp()
  {
    $this->config = array(
        "uri" => "https://api.paris.fr:3000/data/",
        "token" => "",
    );

    $logger = new Logger('unit_test');
    $this->client = new ApiClient($this->config["uri"], $this->config["token"], $logger, $debug = true);
  }

  /**
   * ==========================================================================
   * QueFaire 
   * ==========================================================================
   */
  
  public function testGetCategories()
  {
    $this->client->setNamespace("QueFaire");
    $this->client->setVersion("1.2");
    $this->client->setServiceName("get_categories");
    $this->client->setParams(array(
        "cid" => "",
        "created" => "",
        "offset" => "",
        "limit" => "",
    ));
    
    $this->assertEquals(
            "https://api.paris.fr:3000/data/1.2/QueFaire/get_categories/?token=&cid=&created=&offset=&limit=", $this->client->getRequestParams()
    );
  }
  
  public function testGetActivities()
  {
    $this->client->setNamespace("QueFaire");
    $this->client->setVersion("1.2");
    $this->client->setServiceName("get_activities");
    $this->client->setParams(array(
        "cid" => "",
        "created" => "",
        "offset" => "",
        "limit" => "",
    ));
    
    $this->assertEquals(
            "https://api.paris.fr:3000/data/1.2/QueFaire/get_activities/?token=&cid=&created=&offset=&limit=", $this->client->getRequestParams()
    );
  }

  public function testGetGeoActivities()
  {
    $this->client->setNamespace("QueFaire");
    $this->client->setVersion("1.2");
    $this->client->setServiceName("get_geo_activities");
    $this->client->setParams(array(
        "cid" => "",
        "created" => "",
        "lat" => "",
        "lon" => "",
        "radius" => "",
        "offset" => "",
        "limit" => "",    
    ));
    
    $this->assertEquals(
            "https://api.paris.fr:3000/data/1.2/QueFaire/get_geo_activities/?token=&cid=&created=&lat=&lon=&radius=&offset=&limit=", $this->client->getRequestParams()
    );
  }
  
  public function testGetActivity()
  {
    $this->client->setNamespace("QueFaire");
    $this->client->setVersion("1.0");
    $this->client->setServiceName("get_activity");
    $this->client->setParams(array(
        "id" => "",  
    ));
    
    $this->assertEquals(
            "https://api.paris.fr:3000/data/1.0/QueFaire/get_activity/?token=&id=", $this->client->getRequestParams()
    );
  }

  /**
   * ==========================================================================
   * Equipements 
   * ==========================================================================
   */
  public function testEqGetCategories()
  {
    $this->client->setNamespace("Equipements");
    $this->client->setVersion("1.0");
    $this->client->setServiceName("get_categories");
    $this->client->setParams(array());
    
    $this->assertEquals(
            "https://api.paris.fr:3000/data/1.0/Equipements/get_categories/?token=", $this->client->getRequestParams()
    );
  }
  
  public function testEqGetEquipements()
  {
    $this->client->setNamespace("Equipements");
    $this->client->setVersion("1.0");
    $this->client->setServiceName("get_equipements");
    $this->client->setParams(array(
        "cid" => "",
        "offset" => "",
        "limit" => "",
    ));
    
    $this->assertEquals(
            "https://api.paris.fr:3000/data/1.0/Equipements/get_equipements/?token=&cid=&offset=&limit=", $this->client->getRequestParams()
    );
  }
  
  public function testEqGetEquipement()
  {
    $this->client->setNamespace("Equipements");
    $this->client->setVersion("1.0");
    $this->client->setServiceName("get_equipement");
    $this->client->setParams(array(
        "id" => "",
    ));
    
    $this->assertEquals(
            "https://api.paris.fr:3000/data/1.0/Equipements/get_equipement/?token=&id=", $this->client->getRequestParams()
    );
  }
  
  public function testEqGetCrowdLevel()
  {
    $this->client->setNamespace("Equipements");
    $this->client->setVersion("1.0");
    $this->client->setServiceName("get_crowd_level");
    $this->client->setParams(array(
        "id" => "",
    ));
    
    $this->assertEquals(
            "https://api.paris.fr:3000/data/1.0/Equipements/get_crowd_level/?token=&id=", $this->client->getRequestParams()
    );
  }
}
