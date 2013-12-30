<?php

namespace JeanDeJean\Component\Render;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Page
 *
 * @author nicolas
 */
class Youtube implements IRenderer
{
  private $link;
  
  public function __construct($link)
  {
    $this->link = $link;
  }
  
  public function render()
  {
    
  }
  
}
