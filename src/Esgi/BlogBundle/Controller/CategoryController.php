<?php

namespace Esgi\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class CategoryController extends Controller
{
    /**
     * Finds and displays a Category entity.
     *
     * @param string $slug The category's slug
     */
    public function showAction($slug)
    {
        $em = $this->getDoctrine()->getManager();

        $category = $em->getRepository('EsgiBlogBundle:Categories')->findOneByCategorySlug($slug);

        if (!$category) {
            throw $this->createNotFoundException('Unable to find the category');
        }

        $categoryId    = $category->getId();
        $categoryPosts = $em->getRepository('EsgiBlogBundle:Posts')->findByCategory($categoryId);

        if (!$categoryPosts) {
            $categoryPosts = array();
        }
        return $this->render('EsgiBlogBundle:Categories:show.html.twig', array(
            'categoryPosts'      => $categoryPosts,
        ));
    }
}
