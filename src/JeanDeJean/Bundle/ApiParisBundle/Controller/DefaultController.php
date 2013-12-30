<?php

namespace JeanDeJean\Bundle\ApiParisBundle\Controller;

use Symfony\Component\DependencyInjection\ContainerAware;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends ContainerAware
{

  /**
   * @Route("/", name="home")
   * @Template()
   */
  public function indexAction()
  {
    $cache = $this->container->get('cache');
    $apiQuefaire = $this->container->get('jean_de_jean_api_paris.api.quefaire');
    if (false === $qf_categories = $cache->fetch('quefaire_categories')) {
      $qf_categories = $apiQuefaire->getCategories();
      $cache->save('quefaire_categories', $qf_categories);
    }
    $apiEquipements = $this->container->get('jean_de_jean_api_paris.api.equipements');
    if (false === $eq_categories = $cache->fetch('equipements_categories')) {
      $eq_categories = $apiEquipements->getCategories();
      $cache->save('equipements_categories', $eq_categories);
    }
    return array(
        "quefaire_categories" => json_decode($qf_categories),
        "equipements_categories" => json_decode($eq_categories),
    );
  }

  /**
   * @Route("/equipement/{id}", name="equipement_view")
   * @Template()
   */
  public function equipementAction($id)
  {
    $cache = $this->container->get('cache');
    $apiEquipements = $this->container->get('jean_de_jean_api_paris.api.equipements');
    if (false === $eq = $cache->fetch('equipement_' . $id)) {
      $eq = $apiEquipements->getEquipement(array("id" => $id));
      $cache->save('equipement_' . $id, $eq);
    }

    return array("equipement" => json_decode($eq));
  }

  /**
   * @Route("/quefaire/category/{id}", name="quefaire_category_view")
   * @Template()
   */
  public function quefaireactivityAction($id)
  {
    $cache = $this->container->get('cache');
    $apiQueFaire = $this->container->get('jean_de_jean_api_paris.api.quefaire');
    if (false === $qf = $cache->fetch('activity_' . $id)) {
      $qf = $apiQueFaire->getActivities(array("cid" => $id, "created" => 0, "offset" => 100, "limit" => 100));
      $cache->save('activity_' . $id, $qf);
    }

    return array("activity" => json_decode($qf));
  }

}
