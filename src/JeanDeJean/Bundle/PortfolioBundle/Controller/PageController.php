<?php

namespace JeanDeJean\Bundle\PortfolioBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class PageController extends Controller
{
  
  /**
   * @Route("/portfolio/{menu_name}/{slug}", name="view_page")
   * @Template()
   */
  public function indexAction($slug)
  {
    $page = $this->getDoctrine()->getRepository('JeanDeJeanPortfolioBundle:Portfolio\Page')->findOneBy(array('slug' => $slug));
    return array('page' => $page);
  }
}
