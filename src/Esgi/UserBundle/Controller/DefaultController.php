<?php

namespace Esgi\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('EsgiUserBundle:Default:index.html.twig', array('name' => $name));
    }
}
