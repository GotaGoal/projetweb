<?php

namespace BDE\PlatformBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use BDE\PlatformBundle\Entity\AssociationRole;
use BDE\PlatformBundle\Entity\Association;

class LoadAssociationRole implements FixtureInterface
{
	public function load(ObjectManager $manager)
	{
		$listidUser = array(1,2);
		$listidRole = array(7,8);
		$listidAssociation = array(4,4);
		
		for ($i=0; $i <sizeof($listidUser) ; $i++) { 
			$association = new AssociationRole;
			$asso = new Association;
			$asso->get
			$association->setAssociation($listidAssociation[$i]);
			$association->setRole($listidRole[$i]);
			$association->setUser($listidUser[$i]);
			$manager->persist($association);
		}
		$manager->flush();
	}
}



?>