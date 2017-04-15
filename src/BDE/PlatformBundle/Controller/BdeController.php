<?php

namespace BDE\PlatformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use BDE\PlatformBundle\Entity\Carousel;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

class BdeController extends Controller
{
	
    public function indexAction(Request $request)
    {
    	//$userManager = $this->get('fos_user.user_manager');

    	//$session = $request->getSession();
    	//$userId = $session->get('user_id');

    	//$user = $this->getUser();
    	/*
    	if(null === $user)
    	{
    		return new Response("Pas de user");
    	}
    	else
    	{
    		return new Response("Un user");
    	}

    	if(empty($user_id))
    	{
    		//return new Response("Pas de session");
    	}
    	else
    	{
    		//return new Response("Il y'a une session attention !");
    	}*/

    	//Filtre sur la page
    	/*
    	if(!$this->get('security.authorization_checker')->isGranted('ROLE_ADMIN'))
    	{
    		throw new AccessDeniedException('Accès limité aux auteurs.');
    	}
    	*/


        return $this->render('BDEPlatformBundle:Accueil:index.html.twig');
    }

    public function boutiqueAction()
    {
    	return $this->render('BDEPlatformBundle:Accueil:index.html.twig');
    }

    public function galerieAction()
    {
    	return $this->render('BDEPlatformBundle:Accueil:index.html.twig');
    }

    public function carouselAction()
    {
        $formCarousel = new Carousel();

        $formBuilder = $this->get('form.factory')->createBuilder(FormType::class,$formCarousel);
        $formBuilder->add('urlphoto', TextType::class)->add('id', IntegerType::class)->add('save',SubmitType::class);
        $form = $formBuilder->getForm();
        $em=$this->getDoctrine()->getManager();
        $tabcarousel = $em->getRepository('BDEPlatformBundle:Carousel')->findAll();
        foreach ($tabcarousel as $carousel) {
            //echo $carousel->getUrlphoto();
        }
        return $this->render('BDEPlatformBundle:Admin:carousel.html.twig',array('tabcarousel'=>$tabcarousel,'form'=>$form->createView()));

    }

    
}
