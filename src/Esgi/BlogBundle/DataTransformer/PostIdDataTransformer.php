<?php

namespace Esgi\BlogBundle\DataTransformer;

use Symfony\Component\Form\DataTransformerInterface;
use Symfony\Component\Form\Exception\TransformationFailedException;
use Doctrine\Common\Persistence\ObjectManager;
use Esgi\BlogBundle\Entity\Posts;

class PostIdDataTransformer implements DataTransformerInterface
{
    /**
     * @var ObjectManager
     */
    private $om;

    /**
     * @param ObjectManager $om
     */
    public function __construct(ObjectManager $om)
    {
        $this->om = $om;
    }

    /**
     * Transforms an object (posts) to a string (id).
     *
     * @param  Posts|null $post
     * @return string
     */
    public function transform($posts)
    {
        if (null === $posts) {
            return "";
        }

        return $posts->getId();
    }

    /**
     * Transforms a string (id) to an object (post).
     *
     * @param  string $id
     * @return Posts|null
     * @throws TransformationFailedException if object (posts) is not found.
     */
    public function reverseTransform($id)
    {
        if (!$id) {
            return null;
        }

        $posts = $this->om
            ->getRepository('EsgiBlogBundle:Posts')
            ->findOneBy(array('id' => $id))
        ;

        if (null === $posts) {
            throw new TransformationFailedException(sprintf(
                'Le post avec le numéro "%s" ne peut pas être trouvé!',
                $id
            ));
        }

        return $posts;
    }
}