<?php

namespace Esgi\BlogBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Esgi\BlogBundle\Entity\Posts;
use Esgi\BlogBundle\Form\PostsType;
use Esgi\BlogBundle\Entity\Comments;
use Esgi\BlogBundle\Form\CommentsType;

/**
 * Posts controller.
 *
 */
class PostsController extends Controller
{

    /**
     * Lists all Posts entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('EsgiBlogBundle:Posts')->findByPostStatus('Publié');

        return $this->render('EsgiBlogBundle:Posts:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Posts entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Posts();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('esgi_blog_post_show', array('id' => $entity->getId())));
        }

        return $this->render('EsgiBlogBundle:Posts:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Posts entity.
     *
     * @param Posts $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Posts $entity)
    {
        $form = $this->createForm(new PostsType(), $entity, array(
            'action' => $this->generateUrl('esgi_blog_post_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Creates a form to create a Comments entity.
     *
     * @param Comments $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCommentForm(Comments $entity)
    {
        $form = $this->createForm(new CommentsType(), $entity, array(
            'action' => $this->generateUrl('esgi_blog_comments_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }



    /**
     * Displays a form to create a new Posts entity.
     *
     */
    public function newAction()
    {
        $entity = new Posts();
        $form   = $this->createCreateForm($entity);

        return $this->render('EsgiBlogBundle:Posts:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Posts entity.
     *
     * @param string $slug The post's slug
     */
    public function showAction($slug, $format)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EsgiBlogBundle:Posts')->findOneBySlugJoinedToUser($slug);

        if (!$entity) {
            throw $this->createNotFoundException('The post doesn\'t exists.');
        }

        $id           = $entity->getId();
        $postComments = $em->getRepository('EsgiBlogBundle:Comments')->findByPost($id);

        if (!$postComments) {
            $postComments = array();
        }

        $comments = new Comments();
        $newCommentForm   = $this->createCommentForm($comments);

        return $this->render('EsgiBlogBundle:Posts:show.html.twig', array(
            'entity'      => $entity,
            'comments'    => $comments,
            'postComments' => $postComments,
            'create_comment_form' => $newCommentForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Posts entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EsgiBlogBundle:Posts')->findOneByIdJoinedToUser($id);

        if (!$entity) {
            throw $this->createNotFoundException('The post doesn\'t exists.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('EsgiBlogBundle:Posts:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Posts entity.
    *
    * @param Posts $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Posts $entity)
    {
        $form = $this->createForm(new PostsType(), $entity, array(
            'action' => $this->generateUrl('esgi_blog_post_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Posts entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EsgiBlogBundle:Posts')->findOneByIdJoinedToUser($id);

        if (!$entity) {
            throw $this->createNotFoundException('The post doesn\'t exists.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('esgi_blog_post_edit', array('id' => $id)));
        }

        return $this->render('EsgiBlogBundle:Posts:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Posts entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('EsgiBlogBundle:Posts')->findOneByIdJoinedToUser($id);

            if (!$entity) {
                throw $this->createNotFoundException('The post doesn\'t exists.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('esgi_blog_post'));
    }

    /**
     * Creates a form to delete a Posts entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('esgi_blog_post_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Supprimer','attr' => array('class'=>'btn btn-danger')))
            ->getForm()
        ;
    }
}
