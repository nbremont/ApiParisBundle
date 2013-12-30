<?php

namespace JeanDeJean\Bundle\PortfolioBundle\Entity\Portfolio;

use Doctrine\ORM\Mapping as ORM;

use Gedmo\Mapping\Annotation as Gedmo;

use JeanDeJean\Bundle\PortfolioBundle\Entity\Portfolio\Page;

/**
 * Menu
 *
 * @ORM\Table(name="sf_menu")
 * @ORM\Entity(repositoryClass="JeanDeJean\Bundle\PortfolioBundle\Entity\Portfolio\MenuRepository")
 */
class Menu
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     *
     * @var string
     * 
     * @ORM\Column(name="label", type="string")
     */
    private $label;
    
    /**
     *
     * @var string 
     * 
     * @ORM\Column(name="slug", type="string")
     * @Gedmo\Slug(fields={"label"}, separator="-", updatable=true)
     */
    private $slug;
    
    /**
     *
     * @var Page
     * 
     * @ORM\OneToMany(targetEntity="Page", mappedBy="menu")
     *  
     */
    private $pages;
    
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->pages = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set label
     *
     * @param string $label
     * @return Menu
     */
    public function setLabel($label)
    {
        $this->label = $label;
    
        return $this;
    }

    /**
     * Get label
     *
     * @return string 
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * Add pages
     *
     * @param \JeanDeJean\Bundle\PortfolioBundle\Entity\Portfolio\Page $pages
     * @return Menu
     */
    public function addPage(\JeanDeJean\Bundle\PortfolioBundle\Entity\Portfolio\Page $pages)
    {
        $this->pages[] = $pages;
    
        return $this;
    }

    /**
     * Remove pages
     *
     * @param \JeanDeJean\Bundle\PortfolioBundle\Entity\Portfolio\Page $pages
     */
    public function removePage(\JeanDeJean\Bundle\PortfolioBundle\Entity\Portfolio\Page $pages)
    {
        $this->pages->removeElement($pages);
    }

    /**
     * Get pages
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPages()
    {
        return $this->pages;
    }

    /**
     * Set slug
     *
     * @param string $slug
     * @return Menu
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;
    
        return $this;
    }

    /**
     * Get slug
     *
     * @return string 
     */
    public function getSlug()
    {
        return $this->slug;
    }
}