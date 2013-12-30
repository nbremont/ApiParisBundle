<?php

namespace JeanDeJean\Bundle\PortfolioBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface,
    Doctrine\Common\Persistence\ObjectManager;
use JeanDeJean\Bundle\PortfolioBundle\Entity\Portfolio\Album,
    JeanDeJean\Bundle\PortfolioBundle\Entity\Portfolio\Image;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of LoadAlbumData
 *
 * @author nicolas
 */
class LoadAlbumData implements FixtureInterface
{

  /**
   * {@inheritDoc}
   */
  public function load(ObjectManager $manager)
  {
    /*
    $faker = \Faker\Factory::create();
    $faker->seed(123);
    $album = new Album();
    $album->setName('firstalbumTest');
    $manager->persist($album);

    for ($y = 0; $y < 15; $y++) {
      $image = new Image();
      $image->setDescription($faker->sentence());
      $filename = $faker->image('/var/www/SfPractice/src/JeanDeJean/Bundle/PortfolioBundle/Resources/public/uploads/');
      $filename_formated = substr($filename, strrpos($filename, '/') + 1, strlen($filename));
      $image->setName($filename_formated);
      $image->setAlbum($album);
      $manager->persist($image);
    }

    $manager->flush();*/
  }

}
