<?php

namespace BDE\PlatformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('BDEPlatformBundle:Default:index.html.twig');
    }
}
