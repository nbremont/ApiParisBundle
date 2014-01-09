<?php

namespace JeanDeJean\Component\Test\String;

use JeanDeJean\Component\String\StrTransform;

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
class StrTransformTest extends \PHPUnit_Framework_TestCase
{

  /**
   *
   * @var StrTransform 
   */
  private $strTransform;
  
  public function setUp()
  {
    $this->strTransform = new StrTransform();
  }
  
  public function testSomeString()
  {
    $this->strTransform->setString("somestring");
    $this->assertEquals("somestring", $this->strTransform->strUpperToUndersore(false));
    $this->assertEquals("somestring", $this->strTransform->strUpperToUndersore(true));
  }
  
  public function testOtherString()
  {
    $this->strTransform->setString("totoLLL__FFFSSlimbooO O");
    $this->assertEquals("toto_L_L_L___F_F_F_S_Slimboo_O _O", $this->strTransform->strUpperToUndersore(false));
    $this->assertEquals("toto_l_l_l___f_f_f_s_slimboo_o _o", $this->strTransform->strUpperToUndersore(true));
  }
  
  public function testSringWithDigit()
  {
    $this->strTransform->setString("totolimboo3ddd55_dR");
    $this->assertEquals("totolimboo3ddd55_d_R", $this->strTransform->strUpperToUndersore(false));
    $this->assertEquals("totolimboo3ddd55_d_r", $this->strTransform->strUpperToUndersore(true));
  }
}
