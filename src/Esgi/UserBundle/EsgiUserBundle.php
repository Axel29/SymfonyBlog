<?php

namespace Esgi\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class EsgiUserBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
