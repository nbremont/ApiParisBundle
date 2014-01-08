<?php

namespace JeanDeJean\Component\ApiParis;

use JeanDeJean\Component\String\StrTransform,
    JeanDeJean\Component\ApiParis\ApiClient;

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
abstract class AbstractApi
{

  /**
   *
   * @var ApiClient 
   */
  protected $client;

  /**
   * 
   * @param ApiClient $client
   */
  public function __construct(ApiClient $client)
  {
    $this->client = $client;
  }
  
  /**
   * 
   * @return ApiClient
   */
  public function getClient()
  {
    return $this->client;
  }
  
  /**
   * 
   * @param string $method
   */
  public function initServiceCallable($method)
  {
    $string = new StrTransform($method);
    $this->client->setServiceName($string->strUpperToUndersore());
  }
  
  /**
   * 
   * @param string $name
   * @param array $arguments
   * @return string
   */
  public function __call($name, $arguments = array())
  {
    $this->initServiceCallable($name);
    if (0 < count($arguments)) {
      $this->client->setParams($arguments[0]);
    }
    return (string) $this->client->getCallService();
  }

}
