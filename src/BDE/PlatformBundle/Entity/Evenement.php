<?php

namespace BDE\PlatformBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Evenement
 *
 * @ORM\Table(name="evenement")
 * @ORM\Entity(repositoryClass="BDE\PlatformBundle\Repository\EvenementRepository")
 */
class Evenement
{
    /**
   * @ORM\ManyToMany(targetEntity="BDE\PlatformBundle\Entity\InscriptionActivite", cascade={"persist"})
   */
  private $inscriptions;

    /**
   * @ORM\ManyToMany(targetEntity="BDE\PlatformBundle\Entity\CommentaireActivite", cascade={"persist"})
   */
  private $commentaires;
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
     * @var bool
     *
     * @ORM\Column(name="visibilite", type="boolean")
     */
    private $visibilite;

    /**
     * @var float
     *
     * @ORM\Column(name="prix", type="float")
     */
    private $prix;

    /**
     * @var string
     *
     * @ORM\Column(name="photo", type="text")
     */
    private $photo;

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
     * Set nom
     *
     * @param string $nom
     *
     * @return Evenement
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
     * @return Evenement
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
     * Set visibilite
     *
     * @param boolean $visibilite
     *
     * @return Evenement
     */
    public function setVisibilite($visibilite)
    {
        $this->visibilite = $visibilite;

        return $this;
    }

    /**
     * Get visibilite
     *
     * @return bool
     */
    public function getVisibilite()
    {
        return $this->visibilite;
    }

    /**
     * Set prix
     *
     * @param float $prix
     *
     * @return Evenement
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
     * Set photo
     *
     * @param string $photo
     *
     * @return Evenement
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;

        return $this;
    }

    /**
     * Get photo
     *
     * @return string
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Evenement
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
        $this->commentaires = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add commentaire
     *
     * @param \BDE\PlatformBundle\Entity\CommentaireActivite $commentaire
     *
     * @return Evenement
     */
    public function addCommentaire(\BDE\PlatformBundle\Entity\CommentaireActivite $commentaire)
    {
        $this->commentaires[] = $commentaire;

        return $this;
    }

    /**
     * Remove commentaire
     *
     * @param \BDE\PlatformBundle\Entity\CommentaireActivite $commentaire
     */
    public function removeCommentaire(\BDE\PlatformBundle\Entity\CommentaireActivite $commentaire)
    {
        $this->commentaires->removeElement($commentaire);
    }

    /**
     * Get commentaires
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCommentaires()
    {
        return $this->commentaires;
    }

    /**
     * Add inscription
     *
     * @param \BDE\PlatformBundle\Entity\InscriptionActivite $inscription
     *
     * @return Evenement
     */
    public function addInscription(\BDE\PlatformBundle\Entity\InscriptionActivite $inscription)
    {
        $this->inscriptions[] = $inscription;

        return $this;
    }

    /**
     * Remove inscription
     *
     * @param \BDE\PlatformBundle\Entity\InscriptionActivite $inscription
     */
    public function removeInscription(\BDE\PlatformBundle\Entity\InscriptionActivite $inscription)
    {
        $this->inscriptions->removeElement($inscription);
    }

    /**
     * Get inscriptions
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getInscriptions()
    {
        return $this->inscriptions;
    }
}
