<?php

namespace JeanDeJean\Component\ApiParis;

use JeanDeJean\Component\ApiParis\Exception\ExceptionApi;
use Guzzle\Http\Client;
use Monolog\Logger;

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
class ApiClient
{

  /**
   *
   * @var string 
   */
  private $uri;

  /**
   *
   * @var string 
   */
  private $token;

  /**
   *
   * @var string 
   */
  private $version;

  /**
   *
   * @var string 
   */
  private $response;

  /**
   *
   * @var string 
   */
  private $service_name;

  /**
   *
   * @var array 
   */
  private $params;

  /**
   *
   * @var string 
   */
  private $request;

  /**
   *
   * @var string 
   */
  private $namespace;

  /**
   *
   * @var Logger 
   */
  private $logger;

  /**
   *
   * @var Guzzle\Http\Client
   */
  private $client;

  /**
   *
   * @var boolean 
   */
  private $debug;

  /**
   * 
   */
  public function __construct($uri, $token = "", Logger $logger, $debug = false)
  {
    $this->client = new Client();
    $this->client->setDefaultOption('verify', false);
    $this->uri = $uri;
    $this->token = $token;
    $this->logger = $logger;
    $this->params = array();
    $this->debug = $debug;
    $this->version = "";
    $this->namespace = "";
    $this->request = "";
    $this->response = "";
    $this->service_name = "";
  }

  public function getRequestParams()
  {
    $uri = "";
    if (null !== $this->params) {
      foreach ($this->params as $key => $value) {
        $uri .= "&" . $key . "=" . $value;
      }
    }

    return $this->uri . '/' . $this->version . '/' . $this->namespace . '/' . $this->service_name . '/?token=' . $this->token . $uri;
  }

  public function setToken($token)
  {
    $this->token = $token;
  }

  public function setVersion($version)
  {
    $this->version = $version;
  }

  public function setNamespace($namespace)
  {
    $this->namespace = $namespace;
  }

  public function getServiceName()
  {
    return $this->service_name;
  }

  public function setServiceName($service_name)
  {
    $this->service_name = $service_name;
  }

  public function getParams()
  {
    return $this->params;
  }

  public function setParams($params)
  {
    $this->params = $params;
  }

  public function getCallService()
  {
    $response = $this->client->get($this->getRequestParams())->send();
    $body = $response->getBody()->__toString();
    $this->logger->addInfo($this->getRequestParams());
    $this->response = $response->json();

    if ($this->debug) {
      $this->logger->addDebug(preg_replace("/[\t\s\r]/", "", $body));
    }
    return $this->response;
  }

  public function getResponse()
  {
    return $this->response;
  }

}
