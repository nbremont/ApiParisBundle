<?php

namespace JeanDeJean\Bundle\PortfolioBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface,
    Doctrine\Common\Persistence\ObjectManager;
use JeanDeJean\Bundle\PortfolioBundle\Entity\Portfolio\Menu,
    JeanDeJean\Bundle\PortfolioBundle\Entity\Portfolio\Page;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of LoadMenuPageData
 *
 * @author nicolas
 */
class LoadMenuPageData implements FixtureInterface
{

  public function load(ObjectManager $manager)
  {
    $faker = \Faker\Factory::create();
    $faker->seed(123456789);
    for ($i = 0; $i < 5; $i++) {


      $menu = new Menu();
      $menu->setLabel($faker->company);
      $manager->persist($menu);

      //$album = $manager->getRepository('JeanDeJeanPortfolioBundle:Portfolio\Album')->findOneByName('firstalbumTest');
      
      for ($y = 0; $y < 7; $y++) {
        $page = new Page();
        $page->setName($faker->company);
        $page->setHeader($faker->paragraph(2));
        $page->setContent(implode(' ', $faker->paragraphs(7)));
        $page->setVideo("http://youtu.be/A3PDXmYoF5U");
        $page->setMenu($menu);
        
        $manager->persist($page);
      }
    }

    $manager->flush();
  }

}
