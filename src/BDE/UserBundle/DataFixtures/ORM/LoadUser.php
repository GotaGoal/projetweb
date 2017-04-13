<?php

namespace BDE\UserBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use BDE\UserBundle\Entity\User;

class LoadUser implements FixtureInterface
{
	public function load(ObjectManager $manager)
	{
		$listNames = array('Alexandre','Jérémy','Anna');
		foreach ($listNames as $name) {
			//on crée l'utilisateur
			$user = new User;

			$user->setNom($name);
			$user->setPrenom($name);
			$user->setUsername($name);
			$user->setPassword($name);
			$user->setAvatar($name);
			$user->setMail($name);

			$user->setSalt('');
			$user->setRoles(array('ROLE_USER'));

			$manager->persist($user);

		}
		$manager->flush();
	}
}



?>