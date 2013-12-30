<?php

namespace JeanDeJean\Component\ApiParis;

use JeanDeJean\Component\ApiParis\Exception\ExceptionApi;

use Httpful\Request,
    Httpful\Exception\ConnectionErrorException;

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
   * @var boolean 
   */
  private $debug;
  /**
   * 
   */
  public function __construct($uri, $token = "", Logger $logger, $debug = false)
  {
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
        $uri .= "&" . $key ."=" . $value;
      }
    }
    
    return $this->uri . $this->version . '/' . $this->namespace . '/' . $this->service_name . '/?token=' . $this->token . $uri;
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

  public function callMethod($method)
  {
    try {
      $this->response = Request::{strtolower($method)}($this->getRequestParams())->send();
      $this->logger->addInfo($this->getRequestParams());
      $responseObject = json_decode($this->response);
      if ($responseObject->status == "error") {
        throw new ExceptionApi($responseObject->message);
      }
    } catch (ConnectionErrorException $e) {
      $this->logger->addError("[ConnectionErrorException catch] : " . $e->getMessage());
      $this->logger->addError("[ConnectionErrorException parameters] : " . $this->getRequestParams());
    } catch (ExceptionApi $e) {
      $this->logger->addError("[ExceptionApi catch] : " . $e->getMessage());
    }
    if ($this->debug) {
      $this->logger->addDebug(preg_replace("/[\t\s\r]/", "", $this->response));
    }
    return $this->response;
  }

  public function getResponse()
  {
    return $this->response;
  }

}
