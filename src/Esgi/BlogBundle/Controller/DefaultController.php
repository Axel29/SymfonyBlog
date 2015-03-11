<?php

namespace Esgi\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

use Esgi\BlogBundle\Entity\Post;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
        $em = $this->get('doctrine.orm.entity_manager');
        $publishedPosts = $em->getRepository('EsgiBlogBundle:Post')->findByPublicationStatus(false);

        echo "<pre>"; var_dump($publishedPosts); die;
    }

    public function computeAction($a, $b)
    {
    }

    /**
     * @Route("/new-post")
     * @Template()
     */
    public function newPostAction()
    {
        $post = new Post();
        $post->setTitle('Hello World !');
        $post->setBody('Contenu de mon article');
        
        $em = $this->get('doctrine.orm.entity_manager');
        $em->persist($post); 
        $em->flush();

        return new Response('le post ' . $post->getId() . ' a bien été créé.');
    }

    /**
     * @Route("/addition/{a}/{b}")
     * @Template()
     */
    public function additionAction($a, $b)
    {
        return [
            'sum' => $this->get('esgi.computer')->addition($a,$b),
            'power' => $this->get('esgi.computer')->power($a)
        ];
    }
}
