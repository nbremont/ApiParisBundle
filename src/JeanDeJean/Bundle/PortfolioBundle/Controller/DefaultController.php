<?php

namespace JeanDeJean\Bundle\PortfolioBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="home")
     * @Template("JeanDeJeanPortfolioBundle:Page:index.html.twig")
     */
    public function indexAction()
    {
      $homepage = $this->getDoctrine()->getRepository('JeanDeJeanPortfolioBundle:Portfolio\Page')->getHomePage();
      return array('page' => $homepage);
    }
}
