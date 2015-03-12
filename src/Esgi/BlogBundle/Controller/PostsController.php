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
     * Creates a new Comments entity.
     *
     */
    public function createCommentAction(Request $request)
    {
        $entity = new Comments();
        $form = $this->createCreateForm($entity, $request);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            foreach ($entity->getPost() as $post) {
                $postId = $post->getId();
                breack;
            }
        }

        return $this->redirect($this->generateUrl('esgi_blog_post_show', array('id' => $postId)));
    }

    /**
     * Finds and displays a Posts entity.
     *
     * @param string $slug The post's slug
     */
    public function showAction($slug, $format, Request $request)
    {
        $em     = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('EsgiBlogBundle:Posts')->findOneBySlugJoinedToUser($slug);

        if (!$entity) {
            throw $this->createNotFoundException('The post doesn\'t exists.');
        }

        $id           = $entity->getId();
        $postComments = $em->getRepository('EsgiBlogBundle:Comments')->findByPost($id);

        if (!$postComments) {
            $postComments = array();
        }

        $comments         = new Comments();
        $newCommentForm   = $this->createCommentForm($comments, $request);


        return $this->render('EsgiBlogBundle:Posts:show.html.twig', array(
            'entity'              => $entity,
            'comments'            => $comments,
            'postComments'        => $postComments,
            'create_comment_form' => $newCommentForm->createView(),
        ));
    }

    /**
     * Creates a form to create a Comments entity.
     *
     * @param Comments $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCommentForm(Comments $entity, Request $request)
    {
        $form = $this->createForm(new CommentsType(), $entity, array(
            'action' => $this->generateUrl('esgi_blog_posts_create_comment'),
            'method' => 'POST',
        ));

        $form->add(
            'Add Comment',
            'submit',
            array(
                'attr'  => array('class' => 'btn btn-primary pull-right')),
            array(
                'label' => 'Add Comment'
            )
        );
        return $form;
    }
}
