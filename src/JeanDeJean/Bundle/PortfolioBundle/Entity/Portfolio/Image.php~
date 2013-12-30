<?php

namespace JeanDeJean\Bundle\PortfolioBundle\Entity\Portfolio;

use Doctrine\ORM\Mapping as ORM;

use JeanDeJean\Bundle\PortfolioBundle\Entity\Portfolio\Album;

/**
 * Image
 *
 * @ORM\Table(name="sf_image")
 * @ORM\Entity(repositoryClass="JeanDeJean\Bundle\PortfolioBundle\Entity\Portfolio\ImageRepository")
 */
class Image
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
     * @ORM\Column(name="name", type="string")
     */
    private $name;

    /**
     *
     * @var string
     * @ORM\Column(name="description", type="string") 
     */
    private $description;
    
    /**
     *
     * @var Album
     * 
     * @ORM\ManyToOne(targetEntity="Album", inversedBy="images")
     * @ORM\JoinColumn(name="album_id", referencedColumnName="id")
     * 
     */
    private $album;

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
     * Set album
     *
     * @param \JeanDeJean\Bundle\PortfolioBundle\Entity\Portfolio\Album $album
     * @return Image
     */
    public function setAlbum(\JeanDeJean\Bundle\PortfolioBundle\Entity\Portfolio\Album $album = null)
    {
        $this->album = $album;
    
        return $this;
    }

    /**
     * Get album
     *
     * @return \JeanDeJean\Bundle\PortfolioBundle\Entity\Portfolio\Album 
     */
    public function getAlbum()
    {
        return $this->album;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Image
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
     * Set description
     *
     * @param string $description
     * @return Image
     */
    public function setDescription($description)
    {
        $this->description = $description;
    
        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }
}