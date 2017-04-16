<?php

namespace BDE\PlatformBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use BDE\PlatformBundle\Entity\Carousel;

class LoadCarousel implements FixtureInterface
{
	public function load(ObjectManager $manager)
	{
		
		$listPhoto = array('img/image1.png','img/image2.png','img/image3.png');
		
		foreach ($listPhoto as $photo) {
			//on crée l'utilisateur
			$carousel = new Carousel;
			$carousel->setPath($photo);
			$manager->persist($carousel);	
		}

		$manager->flush();
	}
}



?>