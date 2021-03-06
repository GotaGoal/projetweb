<?php

namespace BDE\PlatformBundle\Repository;

/**
 * RoleRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class RoleRepository extends \Doctrine\ORM\EntityRepository
{
	public function findRole($role)
	{
		$qb = $this->createQueryBuilder('a');
		$qb->where('a.nom = :role')->setParameter('role',$role);
		return $qb->getQuery()->getResult();
	}
}
