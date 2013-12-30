<?php


namespace JeanDeJean\Bundle\PortfolioBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PageType
 *
 * @author nicolas
 */
class PageType extends AbstractType
{
  
  public function buildForm(FormBuilderInterface $builder, array $options)
  {
    $builder
            ->add('name')
            ->add('content')
            ->add('video');
  }
  
  public function getDefaultOptions(array $options)
  {
    return array(
        'data_class' => 'JeanDeJean\Bundle\PortfolioBundle\Entity\Portfolio\Page',
    );
  }
  
  public function getName()
  {
    return 'Page';
  }

}
