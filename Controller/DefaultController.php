<?php

namespace JeanDeJean\Bundle\ApiParisBundle\Controller;

use Symfony\Component\DependencyInjection\ContainerAware;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends ContainerAware
{

  /**
   * @Route("/", name="apiparis_home")
   * @Template()
   */
  public function indexAction()
  {
    $api = $this->container->get('api_paris.api.client');
    $eq_categories = $api->getCommand('equipements_get_categories')->execute();
    $qf_categories = $api->getCommand('quefaire_get_categories')->execute();

    return array(
        "quefaire_categories" => $qf_categories,
        "equipements_categories" => $eq_categories,
    );
  }

  /**
   * @Route("/equipement/{id}", name="apiparis_equipement_view")
   * @Template()
   */
  public function equipementAction($id)
  {
    $api = $this->container->get('api_paris.api.client');
    $command = $api->getCommand('equipements_get_equipement', array("id" => $id));
    return array("equipement" => $command->execute());
  }

  /**
   * @Route("/quefaire/category/{id}", name="apiparis_quefaire_category_view")
   * @Template()
   */
  public function quefaireactivityAction($id)
  {
    $api = $this->container->get('api_paris.api.client');
    $command = $api->getCommand('quefaire_get_activities', array(
        'cid' => $id,
        'created' => 0,
        'offset' => 0,
        'limit' => 100
    ));
    return array("activity" => $command->execute());
  }

}
