<?php
// src/Esgi/BlogBundle/Extensions/EsgiMenu.php

namespace Esgi\BlogBundle\Extensions;

use Symfony\Component\HttpFoundation\Session\Session;
use Doctrine\ORM\EntityManager;

class EsgiMenu
{
    private $session;
    private $em;

    public function __construct(Session $session, EntityManager $em)
    {
        $this->session = $session;
        $this->em      = $em;
    }

    public function getIncludeInMenuCategories()
    {
        $categories = $this->em->getRepository('EsgiBlogBundle:Categories')->findByCategoryIncludeInMenu('1');
        return $categories;
    }
}