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

        $entity = $em->getRepository('EsgiBlogBundle:Categories')->getPostsByCategorySlug($slug);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Posts entity.');
        }

        $id         = $entity->getId();
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('EsgiBlogBundle:Posts:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }
}
