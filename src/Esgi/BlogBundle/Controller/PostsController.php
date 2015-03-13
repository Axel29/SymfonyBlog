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
    public function indexAction($page)
    {
        $maxArticles = 5;

        $em       = $this->getDoctrine()->getManager();
        $postCount = $em->getRepository('EsgiBlogBundle:Posts')->getPostsCount();

        $pagination = array(
            'page' => $page,
            'route' => 'esgi_blog_post',
            'pages_count' => ceil($postCount / $maxArticles),
            'route_params' => array()
        );

        $articles = $this->getDoctrine()->getRepository('EsgiBlogBundle:Posts')
            ->getList($page, $maxArticles);


        return $this->render('EsgiBlogBundle:Posts:index.html.twig', array(
            'posts' => $articles,
            'pagination' => $pagination
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

        $id           = $post->getId();
        $postComments = $em->getRepository('EsgiBlogBundle:Comments')->findByPost($id);

        if (!$postComments) {
            $postComments = array();
        }

        $comments         = new Comments();
        $newCommentForm   = $this->createCommentForm($comments, $request);

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
        $form     = $this->createCommentForm($comments, $request);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($comments);
            $em->flush();
        }
    }

    /**
     * Creates a form to create a Comments entity.
     *
     * @param Comments $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCommentForm(Comments $comments, Request $request)
    {
        $form = $this->createForm(new CommentsType(), $comments, array(
            'action' => $this->generateUrl('esgi_blog_posts_create_comment'),
            'method' => 'POST',
        ));

        $form->add(
            'Add Comment',
            'submit',
            array(
                'attr' => array('class' => 'btn btn-primary pull-right'),),
            array(
                'label' => 'Add Comment',
            )
        );

        return $form;
    }
}
