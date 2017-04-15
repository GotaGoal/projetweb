<?php

namespace BDE\UserBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use BDE\UserBundle\Entity\Authorization;

class LoadAuthorization implements FixtureInterface
{
	public function load(ObjectManager $manager)
	{
		
		$listEmail = array('benjamin.gardien@viacesi.fr','maxence.lliteras@viacesi.fr','tristan.morisot@viacesi.fr','loys.berthelier@viacesi.fr');
		$listNiveau = array('Tuteur','Eleve','Bde','Bde');
		foreach (array_combine($listEmail, $listNiveau) as $email => $niveau) {
			//on crée l'utilisateur
			$autoriz = new Authorization;
			$autoriz->setEmail($email);
			$autoriz->setNiveau($niveau);
			$manager->persist($autoriz);	
		}

		$manager->flush();
	}
}



?>