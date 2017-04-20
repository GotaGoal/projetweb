<?php

namespace BDE\PlatformBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Commande
 *
 * @ORM\Table(name="commande")
 * @ORM\Entity(repositoryClass="BDE\PlatformBundle\Repository\CommandeRepository")
 */
class Commande
{
    /**
    * @ORM\ManyToMany(targetEntity="BDE\PlatformBundle\Entity\Produit", cascade={"persist"})
    */
    private $produits;

    /**
    * @ORM\OneToOne(targetEntity="BDE\UserBundle\Entity\User", cascade={"persist"})
    */
    private $user;

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;


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
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Commande
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->produits = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add produit
     *
     * @param \BDE\PlatformBundle\Entity\Produit $produit
     *
     * @return Commande
     */
    public function addProduit(\BDE\PlatformBundle\Entity\Produit $produit)
    {
        $this->produits[] = $produit;

        return $this;
    }

    /**
     * Remove produit
     *
     * @param \BDE\PlatformBundle\Entity\Produit $produit
     */
    public function removeProduit(\BDE\PlatformBundle\Entity\Produit $produit)
    {
        $this->produits->removeElement($produit);
    }

    /**
     * Get produits
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProduits()
    {
        return $this->produits;
    }

    /**
     * Set user
     *
     * @param \BDE\UserBundle\Entity\User $user
     *
     * @return Commande
     */
    public function setUser(\BDE\UserBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \BDE\UserBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }
}
