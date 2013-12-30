<?php

namespace JeanDeJean\Bundle\PortfolioBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * @Route("/admin")
 */
class AdminController extends Controller
{
  
  /**
   * @Route("/", name="home_admin")
   * @Template()
   */
  public function indexAction()
  {
    return array();
  }
}
