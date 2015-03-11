<?php
namespace Esgi\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class PostController extends Controller
{
    public function indexAction()
    {
        return $this->render(
            'EsgiBlogBundle:Post:index.html.twig'
        );
    }

    /**
     * Add new post
     */
    public function addAction()
    {

    }

    /**
     * Edit existing post
     */
    public function editAction()
    {

    }

    /**
     * Delete existing post
     */
    public function deleteAction()
    {

    }
}
