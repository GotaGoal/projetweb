<?php

namespace BDE\PlatformBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SousCategorie
 *
 * @ORM\Table(name="sous_categorie")
 * @ORM\Entity(repositoryClass="BDE\PlatformBundle\Repository\SousCategorieRepository")
 */
class SousCategorie
{
    /**
   * @ORM\ManyToOne(targetEntity="BDE\PlatformBundle\Entity\Categorie", inversedBy="categorie")
   * @ORM\JoinColumn(nullable=false)
   */
    private $categorie;
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
     * @return SousCategorie
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
     * Set categorie
     *
     * @param \BDE\PlatformBundle\Entity\Categorie $categorie
     *
     * @return SousCategorie
     */
    public function setCategorie(\BDE\PlatformBundle\Entity\Categorie $categorie)
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * Get categorie
     *
     * @return \BDE\PlatformBundle\Entity\Categorie
     */
    public function getCategorie()
    {
        return $this->categorie;
    }
}
