<?php

namespace BDE\PlatformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use BDE\PlatformBundle\Entity\Carousel;
use BDE\PlatformBundle\Entity\AssociationRole;
use BDE\PlatformBundle\Entity\Role;
use BDE\UserBundle\Entity\User;
use BDE\PlatformBundle\Entity\Couleur;
use BDE\PlatformBundle\Entity\Produit;
use BDE\PlatformBundle\Entity\Categorie;
use BDE\PlatformBundle\Repository\AssociationRoleRepository;
use BDE\PlatformBundle\Repository\RoleRepository;
use BDE\PlatformBundle\Entity\Association;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;


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
        $em = $this->getDoctrine()->getManager();
        $listCategorie = $em->getRepository('BDEPlatformBundle:Categorie')->findAll();
    	return $this->render('BDEPlatformBundle:Boutique:boutique.html.twig',array('listCategorie'=>$listCategorie));
    }

    public function galerieAction()
    {
    	return $this->render('BDEPlatformBundle:Accueil:index.html.twig');
    }

    public function carouselAction(Request $request)
    {
        $formCarousel = new Carousel();

        $em=$this->getDoctrine()->getManager();
        $tabcarousel = $em->getRepository('BDEPlatformBundle:Carousel')->findAll();
        foreach ($tabcarousel as $carousel) {
            
            $formBuilder = $this->get('form.factory')->createBuilder(FormType::class,$formCarousel);
        $formBuilder->add('file')->add('id',HiddenType::class,array('data'=>$carousel->getId()))->add('save',SubmitType::class);
        $form = $formBuilder->getForm();
        }

        

        if($request->isMethod('POST'))
        {
            $form->handleRequest($request);
            if($form->isValid())
            {
                $em = $this->getDoctrine()->getManager();
                $formCarousel->upload();
                $em->persist($formCarousel);
                $em->flush();
                return $this->redirectToRoute('bde_admin_carousel');
            }
        }
        
        return $this->render('BDEPlatformBundle:Admin:carousel.html.twig',array('tabcarousel'=>$tabcarousel,'form'=>$form->createView()));

    }

    public function editAction($id, Request $request)
    {

    $formCarousel = new Carousel();
    $em = $this->getDoctrine()->getManager();
    $carousel_slide = $em->getRepository('BDEPlatformBundle:Carousel')->find($id);

    if(null === $carousel_slide)
    {
        throw new NotFoundHttpException("Le slider ".$id."n'existe pas.");
    }

    $formBuilder = $this->get('form.factory')->createBuilder(FormType::class,$formCarousel);
    $formBuilder->add('file',null,array('label' => 'Veuillez choisir une autre image :', 'required' => true));
    $form = $formBuilder->getForm();
    
    if($request->isMethod('POST'))
    {
        $form->handleRequest($request);
        if($form->isValid())
        {
            $carousel_modif = $em->getRepository('BDEPlatformBundle:Carousel')->find($id);
            $formCarousel->upload();
            $carousel_modif->setPath($formCarousel->getPath());
            $em->persist($carousel_modif);
            $em->flush();
        }
    }


    return $this->render('BDEPlatformBundle:Admin:editcarousel.html.twig', array(
      'carousel' => $carousel_slide,'form'=>$form->createView()
    ));
    }

    public function associationsAction(Request $request)
    {
        //$asso = new Association();
        $em = $this->getDoctrine()->getManager();
        
        $listAssociations = $em->getRepository('BDEPlatformBundle:Association')->findAll();        
        return $this->render('BDEPlatformBundle:Association:associations.html.twig',array('listAssociations'=>$listAssociations));
    }

    public function viewassociationAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $association = $em->getRepository('BDEPlatformBundle:Association')->find($id);

        $presi = $em->getRepository('BDEPlatformBundle:Role')->findRole("Président");
        $vicepre = $em->getRepository('BDEPlatformBundle:Role')->findRole("Vice-président");
        $treso = $em->getRepository('BDEPlatformBundle:Role')->findRole("Trésorier");
        $vicetres = $em->getRepository('BDEPlatformBundle:Role')->findRole("Vice-trésorier");
        $secre = $em->getRepository('BDEPlatformBundle:Role')->findRole("Secrétaire");
        $vicesecre = $em->getRepository('BDEPlatformBundle:Role')->findRole("Vice-secrétaire");
        
        
        $president = $em->getRepository('BDEPlatformBundle:AssociationRole')->findRoleAssociation($association,$presi);
        $vicepresident = $em->getRepository('BDEPlatformBundle:AssociationRole')->findRoleAssociation($association,$vicepre);
        $tresorier = $em->getRepository('BDEPlatformBundle:AssociationRole')->findRoleAssociation($association,$treso);
        $vicetresorier = $em->getRepository('BDEPlatformBundle:AssociationRole')->findRoleAssociation($association,$vicetres);
        $secretaire = $em->getRepository('BDEPlatformBundle:AssociationRole')->findRoleAssociation($association,$secre);
        $vicesecretaire = $em->getRepository('BDEPlatformBundle:AssociationRole')->findRoleAssociation($association,$vicesecre);

        if($vicetresorier == null)
        {
            $vicetresorier = $tresorier;
        }

        if($vicepresident == null)
        {
            $vicepresident = $president;
        }

        if($vicesecretaire == null)
        {
            $vicesecretaire = $secretaire;
        }

        return $this->render('BDEPlatformBundle:Association:asso.html.twig', array('association'=>$association,'president'=>$president, 'vicepresident'=>$vicepresident,'tresorier'=>$tresorier,'vicetresorier'=>$vicetresorier,'secretaire'=>$secretaire,'vicesecretaire'=>$vicesecretaire));


    }


    public function testAction(Request $request)
    {
        //ajout utilisateur role 
        /*
        $asso = new Association;
        $user = new User;
        $role = new Role;
        $em = $this->getDoctrine()->getManager();
        $listidUser = array(1,2);
        $listidRole = array(7,8);
        $listidAssociation = array(4,4);
        
        for ($i=0; $i <sizeof($listidUser) ; $i++) { 
            $association = new AssociationRole;

            $asso = $em->getRepository('BDEPlatformBundle:Association')->find($listidAssociation[$i]);
            $association->setAssociation($asso);

            $user = $em->getRepository('BDEUserBundle:User')->find($listidUser[$i]);
            $association->setUser($user);

            $role = $em->getRepository('BDEPlatformBundle:Role')->find($listidRole[$i]);
            $association->setRole($role);

            $em->persist($association);
        }
        $em->flush();
        return new Response("coucou");
        */

        //ajout liste de couleur

        /*
        $listCouleur = array('Bleue','Jaune','Rouge','Gris','Noir');
        $manager = $this->getDoctrine()->getManager();
        
        foreach ($listCouleur as $couleur) {
            //on crée l'utilisateur
            $color = new Couleur;
            $color->setNom($couleur);
            $manager->persist($color);  
        }

        $manager->flush();*/

        //ajout produit + couleur 
        /*

        $em = $this->getDoctrine()->getManager();

        $listCouleur = $em->getRepository('BDEPlatformBundle:Couleur')->findAll();

        $listNomProduit = array('Pull','Porte-Clé','Sweat à capuche','Tasse','Stylo');
        $listDescriptionProduit = array("Magnique pull conçu par les ingéieurs de l'Exia !","Avec ce porte clé, vous êtes garantis de ne plus jamais perdre vos clés ! GPS intégré !","Sweat à capuche ou comment être à la pointe de la mode !","Tasse incluant une magnifique fonctionnalité, vos cafés ne refroidiront plus !","Avec ce stylo plus aucune bavure !");
        $listPrixProduit = array(30,3,40,5,2);
        $listStockProduit = array(50,50,50,50,50);

        for ($i=0; $i <sizeof($listNomProduit) ; $i++) { 
            $produit = new Produit;

            $produit->setNom($listNomProduit[$i]);
            $produit->setDescription($listDescriptionProduit[$i]);
            $produit->setPrix($listPrixProduit[$i]);
            $produit->setStock($listStockProduit[$i]);
            $produit->setNom($listNomProduit[$i]);
            foreach ($listCouleur as $couleur) {
                $produit->addCouleur($couleur);
            }
            $em->persist($produit);
        }
        $em->flush();


    */
        //ajouter listCategorie
        /*
        $listCategorie = array('Vêtements','Goodies','Autre');
        $manager = $this->getDoctrine()->getManager();
        
        foreach ($listCategorie as $categorie) {
            //on crée l'utilisateur
            $cate = new Categorie;
            $cate->setNom($categorie);
            $manager->persist($cate);  
        }

        $manager->flush();
        */
        /*
        $vetement = new Categorie;
        $goodies = new Categorie;
        $autre = new Categorie;

        $em = $this->getDoctrine()->getManager();
        $vetement = $em->getRepository('BDEPlatformBundle:Categorie')->findBy(array('nom'=>'Vêtements'));
        $goodies = $em->getRepository('BDEPlatformBundle:Categorie')->findBy(array('nom'=>'Goodies'));
        $autre = $em->getRepository('BDEPlatformBundle:Categorie')->findBy(array('nom'=>'Autre'));
        $vet = $em->getRepository('BDEPlatformBundle:Categorie')->findBy(array('nom'=>'Vêtements'));

        $goodie = $em->getRepository('BDEPlatformBundle:Categorie')->findBy(array('nom'=>'Goodies'));
        
        $pull = $em->getRepository('BDEPlatformBundle:Produit')->find(1);
        $porte = $em->getRepository('BDEPlatformBundle:Produit')->find(2);
        $sweat = $em->getRepository('BDEPlatformBundle:Produit')->find(3);
        $tasse = $em->getRepository('BDEPlatformBundle:Produit')->find(4);
        $stylo = $em->getRepository('BDEPlatformBundle:Produit')->find(5);

        foreach ($vetement as $vetement) {
            $pull->addCategory($vetement);
            $em->persist($pull);
        }
        
        foreach ($goodies as $goodies) {
            $porte->addCategory($goodies);
            $em->persist($porte);
        }

        foreach ($autre as $autre) {
            $tasse->addCategory($autre);
        $em->persist($tasse);
        }

        foreach ($vet as $vet) {
           $sweat->addCategory($vet);
        $em->persist($sweat);
        }
        
        foreach ($goodie as $goodie) {
            $stylo->addCategory($goodie);
        $em->persist($stylo);
        }


        $em->flush();

        */
        
    }

    
}
