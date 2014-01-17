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
    $apiQuefaire = $this->container->get('jean_de_jean_api_paris.api.quefaire');
    $qf_categories = $apiQuefaire->getCategories();

    $apiEquipements = $this->container->get('jean_de_jean_api_paris.api.equipements');
    $eq_categories = $apiEquipements->getCategories();

    return array(
        "quefaire_categories" => json_decode($qf_categories),
        "equipements_categories" => json_decode($eq_categories),
    );
  }

  /**
   * @Route("/equipement/{id}", name="apiparis_equipement_view")
   * @Template()
   */
  public function equipementAction($id)
  {
    $apiEquipements = $this->container->get('jean_de_jean_api_paris.api.equipements');
    $eq = $apiEquipements->getEquipement(array("id" => $id));
    
    return array("equipement" => json_decode($eq));
  }

  /**
   * @Route("/quefaire/category/{id}", name="apiparis_quefaire_category_view")
   * @Template()
   */
  public function quefaireactivityAction($id)
  {
    $apiQueFaire = $this->container->get('jean_de_jean_api_paris.api.quefaire');
    $qf = $apiQueFaire->getActivities(array("cid" => $id, "created" => 0, "offset" => 100, "limit" => 100));

    return array("activity" => json_decode($qf));
  }

}
