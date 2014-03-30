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
class EquipementsTest extends \PHPUnit_Framework_TestCase
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

  public function test_equipements_get_categories()
  {
    $result = $this->client->getCommand('equipements_get_categories')->execute();
    $this->assertEquals("success", $result['status']);
  }

  public function test_equipements_get_equipements()
  {
    $result = $this->client->getCommand('equipements_get_equipements', array(
                'cid' => 22
            ))->execute();
    $this->assertEquals("success", $result['status']);
  }

  public function test_equipements_get_equipement()
  {
    $result = $this->client->getCommand('equipements_get_equipement', array(
                'id' => 22
            ))->execute();
    $this->assertEquals("success", $result['status']);
  }

  public function test_equipements_get_crowd_level()
  {
    $result = $this->client->getCommand('equipements_get_crowd_level', array(
                'id' => 22
            ))->execute();
    $this->assertEquals("success", $result['status']);
  }

}
