<?php

namespace JeanDeJean\Bundle\PortfolioBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use JeanDeJean\Bundle\PortfolioBundle\Entity\Portfolio\Page,
    JeanDeJean\Bundle\PortfolioBundle\Form\Type\PageType;

/**
 * @Route("/admin/page")
 */
class AdminPageController extends Controller
{

  /**
   * @Route("/", name="admin_page")
   * @Template()
   */
  public function indexAction()
  {
    $pages = $this->getDoctrine()->getRepository('JeanDeJeanPortfolioBundle:Portfolio\Page')->findAll();
    return array('pages' => $pages);
  }

  /**
   * 
   * @param integer $id
   * 
   * @Route("/edit/{id}", name="admin_edit_page")
   * @Template()
   */
  public function editAction($id)
  {
    if (null === $page = $this->getDoctrine()->getRepository('JeanDeJeanPortfolioBundle:Portfolio\Page')->find($id)) {
      $page = new Page();
    }
    $form = $this->get('form.factory')->create(new PageType(), $page);
    return array('form' => $form->createView(), 'page' => $page);
  }

}
