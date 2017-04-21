<?php

namespace BDE\PlatformBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CommentaireActivite
 *
 * @ORM\Table(name="commentaire_activite")
 * @ORM\Entity(repositoryClass="BDE\PlatformBundle\Repository\CommentaireActiviteRepository")
 */
class CommentaireActivite
{
    /**
   * @ORM\ManyToOne(targetEntity="BDE\UserBundle\Entity\User")
   * @ORM\JoinColumn(nullable=false)
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
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;


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
     * Set description
     *
     * @param string $description
     *
     * @return CommentaireActivite
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
     * Set user
     *
     * @param \BDE\UserBundle\Entity\User $user
     *
     * @return CommentaireActivite
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
