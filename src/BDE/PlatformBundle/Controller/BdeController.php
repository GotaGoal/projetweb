<?php

namespace BDE\PlatformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class BdeController extends Controller
{
    public function indexAction(Request $request)
    {
    	//$session = $request->getSession();
    	//$userId = $session->get('user_id');

    	$user = $this->getUser();
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

    
}
