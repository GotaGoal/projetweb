<?php

namespace BDE\PlatformBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use BDE\PlatformBundle\Entity\Couleur;

class LoadCouleur implements FixtureInterface
{
	public function load(ObjectManager $manager)
	{
		
		$listCouleur = array('Bleue','Jaune','Rouge','Gris','Noir');
		
		foreach ($listCouleur as $couleur) {
			//on crée l'utilisateur
			$color = new Couleur;
			$color->setNom($couleur);
			$manager->persist($color);	
		}

		$manager->flush();
	}
}



?>