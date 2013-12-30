<?php

namespace JeanDeJean\Bundle\PortfolioBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MenuController
 *
 * @author nicolas
 */
class MenuController extends Controller
{
  /**
   * @Route("/menu", name="get_menu")
   * @Template()
   */
  public function menuAction()
  {
    $menu = array();
    $menuEntities = $this->getDoctrine()->getRepository('JeanDeJeanPortfolioBundle:Portfolio\Menu')->getMenu();
    
    return array('menu' => $menuEntities);
  }
}
