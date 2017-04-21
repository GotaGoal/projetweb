<?php

namespace BDE\PlatformBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * LikeActivite
 *
 * @ORM\Table(name="like_activite")
 * @ORM\Entity(repositoryClass="BDE\PlatformBundle\Repository\LikeActiviteRepository")
 */
class LikeActivite
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
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set user
     *
     * @param \BDE\UserBundle\Entity\User $user
     *
     * @return LikeActivite
     */
    public function setUser(\BDE\UserBundle\Entity\User $user)
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
