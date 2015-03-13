<?php
// src/Esgi/BlogBundle/Twig/EsgiBlogExtension.php

namespace Esgi\BlogBundle\Extensions;

use Esgi\BlogBundle\Extensions\EsgiMenu;

class EsgiMenuExtension extends \Twig_Extension
{
    protected $esgiMenu;

    function __construct(EsgiMenu $esgiMenu)
    {
        $this->esgiMenu = $esgiMenu;
    }

    public function getGlobals() {
        return array(
            'esgimenu' => $this->esgiMenu
        );
    }

    public function getName()
    {
        return 'esgimenu';
    }
}