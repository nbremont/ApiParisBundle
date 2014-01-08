<?php

namespace JeanDeJean\Component\String;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of StrTransform
 *
 * @author nicolas
 */
class StrTransform
{

  /**
   *
   * @var string 
   */
  private $string;

  /**
   * 
   * @param string $string
   */
  public function __construct($string = "")
  {
    $this->string = $string;
  }
  
  /**
   * 
   * @param srting $string
   */
  public function setString($string)
  {
    $this->string = $string;
  }

  /**
   * 
   * @param boolean $lower
   * @return string
   */
  public function strUpperToUndersore($lower = true)
  {
    $tmp = "";
    for ($i = 0; $i < strlen($this->string); $i++) {
      if (1 === preg_match("/([A-Z])/", $this->string[$i])) {
        $tmp .= '_';
      }
      $tmp .= $this->string[$i];
    }
    return (true === $lower) ? strtolower($tmp) : $tmp;
  }

}
