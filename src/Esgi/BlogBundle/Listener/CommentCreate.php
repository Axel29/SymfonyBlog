<?php
// src/Esgi/BlogBundle/Listener/CommentCreate.php

namespace Esgi\BlogBundle\Listener;

use Doctrine\ORM\Event\LifecycleEventArgs;
use Esgi\BlogBundle\Entity\Posts;
use Esgi\BlogBundle\Entity\Comments;

class CommentCreate
{
    public function postPersist(LifecycleEventArgs $args)
    {
        $entity        = $args->getEntity();
        $entityManager = $args->getEntityManager();
        $posts         = $entity->getPost();
        $postIds       = array();
        foreach ($posts as $post) {
            $postIds[] = $post->getId();
        }

        if ($entity instanceof Comments) {
            foreach ($postIds as $postId) {
                $query = $entityManager
                    ->createQuery('
                    UPDATE Esgi\BlogBundle\Entity\Posts p
                    SET p.commentsCount = p.commentsCount+1
                    WHERE p.id = :postId'
                    )
                    ->setParameter('postId', $postId)
                ;

                try {
                    $query->getSingleResult();
                } catch (\Doctrine\ORM\NoResultException $e) {
                    return null;
                }
            }

            return true;
        }
    }
}