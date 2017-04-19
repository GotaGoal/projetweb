<?php

namespace BDE\PlatformBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Categorie
 *
 * @ORM\Table(name="categorie")
 * @ORM\Entity(repositoryClass="BDE\PlatformBundle\Repository\CategorieRepository")
 */
class Categorie
{
    /**
    * @ORM\OneToMany(targetEntity="BDE\PlatformBundle\Entity\Categorie", mappedBy="categorie")
   */
  private $souscategories;

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Categorie
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->souscategories = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add souscategory
     *
     * @param \BDE\PlatformBundle\Entity\Categorie $souscategory
     *
     * @return Categorie
     */
    public function addSouscategory(\BDE\PlatformBundle\Entity\Categorie $souscategory)
    {
        $this->souscategories[] = $souscategory;

        return $this;
    }

    /**
     * Remove souscategory
     *
     * @param \BDE\PlatformBundle\Entity\Categorie $souscategory
     */
    public function removeSouscategory(\BDE\PlatformBundle\Entity\Categorie $souscategory)
    {
        $this->souscategories->removeElement($souscategory);
    }

    /**
     * Get souscategories
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSouscategories()
    {
        return $this->souscategories;
    }
}
