<?php

namespace BDE\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

class UserController extends Controller
{
	/**
	* @Security("has_role('ROLE_USER')")
	*/
    public function confirmedAction(Request $request)
    {
        /*
    	$userManager = $this->get('fos_user.user_manager');
    	$user = $userManager->findUserBy(array('username' => 'Goal'));

    	$user->setEmail('cetemail@nexiste.pas');
    	$userManager->updateUser($user);

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


        return new Response("Coucou");
    }
    
}
