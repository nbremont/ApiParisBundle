<?php

namespace JeanDeJean\Component\ApiParis;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ApiEquipements
 *
 * @author nicolas
 */
class ApiEquipements extends AbstractApi
{

  /**
   *
   * @var string 
   */
  public static $version = "1.0";

  /**
   *
   * @var string 
   */
  public static $namesapce = "Equipements";

  /**
   * 
   * @param \JeanDeJean\Component\ApiParis\ApiClient $client
   */
  public function __construct(ApiClient $client)
  {
    parent::__construct($client);
    $this->client->setNamespace(self::$namesapce);
    $this->client->setVersion(self::$version);
  }
  
}
