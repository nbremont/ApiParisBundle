<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace JeanDeJean\Bundle\ApiParisBundle\Tests\Api;

/**
 * Description of QueFaireTest
 *
 * @author nicolas
 */
class QueFaireTest extends \PHPUnit_Framework_TestCase
{

  private $client;

  public function setUp()
  {
    $serviceDescription = \Guzzle\Service\Description\ServiceDescription::factory(\dirname(\dirname(__DIR__)) . '/Resources/config/api.json');
    $this->client = new \Guzzle\Service\Client();
    $this->client->setDescription($serviceDescription);
    $this->client->setDefaultOption('query', array('token' => TOKEN_API));
    $this->client->setDefaultOption('verify', false);
  }

  public function test_quefaire_get_categories()
  {
    $result = $this->client->getCommand('quefaire_get_categories')->execute();
    $this->assertEquals("success", $result['status']);
  }

  public function test_quefaire_get_activities()
  {
    $result = $this->client->getCommand('quefaire_get_activities', array(
                'cid' => 22,
            ))->execute();
    $this->assertEquals("success", $result['status']);
  }

  public function test_quefaire_search_activities()
  {
    $result = $this->client->getCommand('quefaire_search_activities', array(
                'cid' => 0,
                'keyword' => 'sport'
            ))->execute();
    $this->assertEquals("success", $result['status']);
  }

  public function test_quefaire_get_geo_activities()
  {
    $result = $this->client->getCommand('quefaire_get_geo_activities', array(
                'cid' => 22,
                'lat' => '48.856332',
                'lon' => '2.353453',
                'radius' => 5
            ))->execute();
    $this->assertEquals("success", $result['status']);
  }

  public function test_quefaire_get_activity()
  {
    $result = $this->client->getCommand('quefaire_get_activity', array(
                'id' => 78378
            ))->execute();
    $this->assertEquals("success", $result['status']);
  }

}
