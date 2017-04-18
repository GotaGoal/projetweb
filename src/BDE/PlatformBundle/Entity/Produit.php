<?php

namespace BDE\PlatformBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Produit
 *
 * @ORM\Table(name="produit")
 * @ORM\Entity(repositoryClass="BDE\PlatformBundle\Repository\ProduitRepository")
 */
class Produit
{
    /**
   * @ORM\ManyToMany(targetEntity="BDE\PlatformBundle\Entity\Couleur", cascade={"persist"})
   */
  private $couleurs;

  /**
   * @ORM\ManyToMany(targetEntity="BDE\PlatformBundle\Entity\Categorie", cascade={"persist"})
   */
  private $categories;
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
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var float
     *
     * @ORM\Column(name="prix", type="float")
     */
    private $prix;

    /**
     * @var int
     *
     * @ORM\Column(name="stock", type="integer")
     */
    private $stock;


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
     * @return Produit
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
     * Set description
     *
     * @param string $description
     *
     * @return Produit
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

    /**
     * Set prix
     *
     * @param float $prix
     *
     * @return Produit
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;

        return $this;
    }

    /**
     * Get prix
     *
     * @return float
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * Set stock
     *
     * @param integer $stock
     *
     * @return Produit
     */
    public function setStock($stock)
    {
        $this->stock = $stock;

        return $this;
    }

    /**
     * Get stock
     *
     * @return int
     */
    public function getStock()
    {
        return $this->stock;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->couleurs = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add couleur
     *
     * @param \BDE\PlatformBundle\Entity\Couleur $couleur
     *
     * @return Produit
     */
    public function addCouleur(\BDE\PlatformBundle\Entity\Couleur $couleur)
    {
        $this->couleurs[] = $couleur;

        return $this;
    }

    /**
     * Remove couleur
     *
     * @param \BDE\PlatformBundle\Entity\Couleur $couleur
     */
    public function removeCouleur(\BDE\PlatformBundle\Entity\Couleur $couleur)
    {
        $this->couleurs->removeElement($couleur);
    }

    /**
     * Get couleurs
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCouleurs()
    {
        return $this->couleurs;
    }

    /**
     * Add category
     *
     * @param \BDE\PlatformBundle\Entity\Categorie $category
     *
     * @return Produit
     */
    public function addCategory(\BDE\PlatformBundle\Entity\Categorie $category)
    {
        $this->categories[] = $category;

        return $this;
    }

    /**
     * Remove category
     *
     * @param \BDE\PlatformBundle\Entity\Categorie $category
     */
    public function removeCategory(\BDE\PlatformBundle\Entity\Categorie $category)
    {
        $this->categories->removeElement($category);
    }

    /**
     * Get categories
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCategories()
    {
        return $this->categories;
    }
}
