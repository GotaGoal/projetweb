<?php

namespace BDE\PlatformBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use BDE\PlatformBundle\Entity\Role;

class LoadRole implements FixtureInterface
{
	public function load(ObjectManager $manager)
	{
		
		$listRole = array('Président','Vice-président','Secrétaire','Vice-secrétaire','Trésorier','Vice-trésorier');
		
		foreach ($listRole as $role) {
			//on crée l'utilisateur
			$newRole = new Role;
			$newRole->setNom($role);
			$manager->persist($newRole);	
		}

		$manager->flush();
	}
}



?>