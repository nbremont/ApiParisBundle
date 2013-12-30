<?php

namespace JeanDeJean\Bundle\PortfolioBundle\Entity\Portfolio;

use Doctrine\ORM\Mapping as ORM,
    Doctrine\Common\Collections\ArrayCollection;

use JeanDeJean\Bundle\PortfolioBundle\Entity\Portfolio\Image,
    JeanDeJean\Bundle\PortfolioBundle\Entity\Portfolio\Page;

/**
 * Album
 *
 * @ORM\Table(name="sf_album")
 * @ORM\Entity(repositoryClass="JeanDeJean\Bundle\PortfolioBundle\Entity\Portfolio\AlbumRepository")
 */
class Album
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
     *  @ORM\Column(name="name", type="string")
     */
    private $name;
    
    /**
     *
     * @var ArrayCollection 
     * 
     * @ORM\OneToMany(targetEntity="Image", mappedBy="album")
     */
    private $images;
           
    
    /**
     *
     * @var Page 
     * 
     * @ORM\OneToMany(targetEntity="Page", mappedBy="album")
     */
    private $pages;
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->images = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set name
     *
     * @param string $name
     * @return Album
     */
    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Add images
     *
     * @param \JeanDeJean\Bundle\PortfolioBundle\Entity\Portfolio\Image $images
     * @return Album
     */
    public function addImage(\JeanDeJean\Bundle\PortfolioBundle\Entity\Portfolio\Image $images)
    {
        $this->images[] = $images;
    
        return $this;
    }

    /**
     * Remove images
     *
     * @param \JeanDeJean\Bundle\PortfolioBundle\Entity\Portfolio\Image $images
     */
    public function removeImage(\JeanDeJean\Bundle\PortfolioBundle\Entity\Portfolio\Image $images)
    {
        $this->images->removeElement($images);
    }

    /**
     * Get images
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getImages()
    {
        return $this->images;
    }

    /**
     * Add pages
     *
     * @param \JeanDeJean\Bundle\PortfolioBundle\Entity\Portfolio\Page $pages
     * @return Album
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
}