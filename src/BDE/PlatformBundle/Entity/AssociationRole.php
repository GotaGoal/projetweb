<?php

namespace BDE\PlatformBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AssociationRole
 *
 * @ORM\Table(name="association_role")
 * @ORM\Entity(repositoryClass="BDE\PlatformBundle\Repository\AssociationRoleRepository")
 */
class AssociationRole
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

     /**
    * @ORM\ManyToOne(targetEntity="BDE\PlatformBundle\Entity\Association")
    * @ORM\JoinColumn(nullable=false)
    */
    private $association;

    /**
    * @ORM\ManyToOne(targetEntity="BDE\UserBundle\Entity\User")
    * @ORM\JoinColumn(nullable=false)
    */
    private $user;

    /**
    * @ORM\ManyToOne(targetEntity="BDE\PlatformBundle\Entity\Role")
    * @ORM\JoinColumn(nullable=false)
    */
    private $role;

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
     * Set association
     *
     * @param \BDE\PlatformBundle\Entity\Association $association
     *
     * @return AssociationRole
     */
    public function setAssociation(\BDE\PlatformBundle\Entity\Association $association)
    {
        $this->association = $association;

        return $this;
    }

    /**
     * Get association
     *
     * @return \BDE\PlatformBundle\Entity\Association
     */
    public function getAssociation()
    {
        return $this->association;
    }

    /**
     * Set user
     *
     * @param \BDE\UserBundle\Entity\User $user
     *
     * @return AssociationRole
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

    /**
     * Set role
     *
     * @param \BDE\PlatformBundle\Entity\Role $role
     *
     * @return AssociationRole
     */
    public function setRole(\BDE\PlatformBundle\Entity\Role $role)
    {
        $this->role = $role;

        return $this;
    }

    /**
     * Get role
     *
     * @return \BDE\PlatformBundle\Entity\Role
     */
    public function getRole()
    {
        return $this->role;
    }
}
