<?php

namespace JeanDeJean\Bundle\PortfolioBundle\Twig;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of JeanDeJeanExtension
 *
 * @author nicolas
 */
class PortfolioExtension extends \Twig_Extension
{

  public function getFilters()
  {
    return array(
        'youtube' => new \Twig_Filter_Method($this, 'youtubeFilter'),
    );
  }

  public function youtubeFilter($link, $width = 560, $height = 315)
  {
    $link_formated = substr($link, strrpos($link, '/') + 1, strlen($link));
    return sprintf('<iframe width="%d" height="%d" src="//www.youtube.com/embed/%s" frameborder="0" allowfullscreen></iframe>', $width, $height, $link_formated);
  }

  public function getName()
  {
    return 'portfolio_extension';
  }

}
