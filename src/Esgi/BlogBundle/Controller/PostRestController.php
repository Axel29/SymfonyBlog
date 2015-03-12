<?php

namespace Esgi\BlogBundle\Controller;

use FOS\RestBundle\Controller\Annotations\View;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations\Post;
use FOS\RestBundle\Controller\Annotations\Get;

class PostRestController extends Controller
{
    /**
     * @param type $post
     * @Get("/post/{id}")
     * @View(serializerGroups={"Default","Details"})
     */
    public function getPostAction($id)
    {
        $post = $this->getDoctrine()->getManager()->getRepository('EsgiBlogBundle:Posts')->find($id);

        if (!is_object($post)) {
            $data = array("error" => "unknown post");
            $response = new Response(json_encode($data), 404);
            $response->headers->set('Content-Type', 'application/json', 'charset=utf-8');

            return $response;
        }

        return $post;
    }

    /**
     * @param type $posts
     * @Get("/posts")
     * @View(serializerGroups={"Default","Details"})
     */
    public function getPostsAction()
    {
        $posts = $this->getDoctrine()->getManager()->getRepository('EsgiBlogBundle:Posts')->findAll();

        return $posts;
    }
}
