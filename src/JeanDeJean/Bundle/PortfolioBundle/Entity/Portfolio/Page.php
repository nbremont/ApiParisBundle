<?php

namespace JeanDeJean\Bundle\PortfolioBundle\Entity\Portfolio;

use Doctrine\ORM\Mapping as ORM;

use Gedmo\Mapping\Annotation as Gedmo;

use JeanDeJean\Bundle\PortfolioBundle\Entity\Portfolio\Album,
    JeanDeJean\Bundle\PortfolioBundle\Entity\Portfolio\Menu;

/**
 * Page
 *
 * @ORM\Table(name="sf_page")
 * @ORM\Entity(repositoryClass="JeanDeJean\Bundle\PortfolioBundle\Entity\Portfolio\PageRepository")
 */
class Page
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
     * @ORM\Column(name="name", type="string", unique=true) 
     */
    private $name;

    /**
     *
     * @var string
     * 
     * @ORM\Column(name="header", type="string")
     */
    private $header;
    
    /**
     *
     * @var string
     * 
     * @ORM\Column(name="content", type="text") 
     */
    private $content;
    
    /**
     *
     * @var Album
     * 
     * @ORM\ManyToOne(targetEntity="Album", inversedBy="pages")
     * @ORM\JoinColumn(name="album_id", referencedColumnName="id")
     * 
     */
    private $album;
    
    /**
     *
     * @var string 
     * 
     * @ORM\Column(name="video", type="string") 
     */
    private $video;
    
    
    /**
     * 
     * @ORM\ManyToOne(targetEntity="Menu", inversedBy="pages")
     * @ORM\JoinColumn(name="menu_id", referencedColumnName="id")
     */
    private $menu;
    
    /**
     *
     * @var boolean
     * 
     * @ORM\Column(name="home", type="boolean") 
     */
    private $home = false;
    
    /**
     *
     * @var string
     * 
     * @ORM\Column(name="slug", type="string", unique=true)
     * @Gedmo\Slug(fields={"name"}, separator="-", updatable=true)
     */
    private $slug;

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
     * @return Page
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
     * Set header
     *
     * @param string $header
     * @return Page
     */
    public function setHeader($header)
    {
        $this->header = $header;
    
        return $this;
    }

    /**
     * Get header
     *
     * @return string 
     */
    public function getHeader()
    {
        return $this->header;
    }

    /**
     * Set content
     *
     * @param string $content
     * @return Page
     */
    public function setContent($content)
    {
        $this->content = $content;
    
        return $this;
    }

    /**
     * Get content
     *
     * @return string 
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set video
     *
     * @param string $video
     * @return Page
     */
    public function setVideo($video)
    {
        $this->video = $video;
    
        return $this;
    }

    /**
     * Get video
     *
     * @return string 
     */
    public function getVideo()
    {
        return $this->video;
    }

    /**
     * Set home
     *
     * @param boolean $home
     * @return Page
     */
    public function setHome($home)
    {
        $this->home = $home;
    
        return $this;
    }

    /**
     * Get home
     *
     * @return boolean 
     */
    public function getHome()
    {
        return $this->home;
    }

    /**
     * Set album
     *
     * @param \JeanDeJean\Bundle\PortfolioBundle\Entity\Portfolio\Album $album
     * @return Page
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
     * Set menu
     *
     * @param \JeanDeJean\Bundle\PortfolioBundle\Entity\Portfolio\Menu $menu
     * @return Page
     */
    public function setMenu(\JeanDeJean\Bundle\PortfolioBundle\Entity\Portfolio\Menu $menu = null)
    {
        $this->menu = $menu;
    
        return $this;
    }

    /**
     * Get menu
     *
     * @return \JeanDeJean\Bundle\PortfolioBundle\Entity\Portfolio\Menu 
     */
    public function getMenu()
    {
        return $this->menu;
    }
    

    /**
     * Set slug
     *
     * @param string $slug
     * @return Page
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