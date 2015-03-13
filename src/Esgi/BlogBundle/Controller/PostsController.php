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
 */
class PostsController extends Controller
{
    /**
     * Lists all Posts entities.
     */
    public function indexAction()
    {
        $em       = $this->getDoctrine()->getManager();
        $posts    = $em->getRepository('EsgiBlogBundle:Posts')->findBy(array('postStatus' => 'Publié'), null, 10, null);

        return $this->render('EsgiBlogBundle:Posts:index.html.twig', array(
            'posts'      => $posts,
        ));
    }

    /**
     * Finds and displays a Posts entity.
     *
     * @param string $slug The post's slug
     */
    public function showAction($slug, $format, Request $request)
    {
        $em   = $this->getDoctrine()->getManager();
        $post = $em->getRepository('EsgiBlogBundle:Posts')->findOneBySlugJoinedToUser($slug);

        if (!$post) {
            throw $this->createNotFoundException('The post doesn\'t exist.');
        }

        // Using "findByPost($id)" overrided in CommentsRepository to add filter on commentApprouved's field.
        $id           = $post->getId();
        $postComments = $em->getRepository('EsgiBlogBundle:Comments')->findByPost($id);

        $comments = new Comments();
        $comments->setPost($post);
        $newCommentForm   = $this->createCommentForm($comments);

        return $this->render('EsgiBlogBundle:Posts:show.html.twig', array(
            'post'                => $post,
            'comments'            => $comments,
            'postComments'        => $postComments,
            'create_comment_form' => $newCommentForm->createView(),
        ));
    }

    /**
     * Creates a new Comments entity.
     */
    public function createCommentAction(Request $request)
    {
        $comments = new Comments();
        $form = $this->createCommentForm($comments);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($comments);
            $em->flush();

            return $this->redirect($this->generateUrl('esgi_blog_post'));
        }

        return $this->redirect($this->generateUrl('esgi_blog_post'));
    }

    /**
     * Creates a form to create a Comments entity.
     *
     * @param Comments $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCommentForm(Comments $comments)
    {
        $form = $this->createForm(new CommentsType(), $comments, array(
            'action' => $this->generateUrl('esgi_blog_posts_create_comment'),
            'method' => 'POST',
            'em' => $this->getDoctrine()->getManager(),
        ));

        $form->add('commentApprouved', 'hidden', array('data' => '0'));
        $form->add('submit', 'submit', array('attr' => array('class' => 'btn btn-primary pull-right'), 'label' => 'Create'));

        return $form;
    }
}
