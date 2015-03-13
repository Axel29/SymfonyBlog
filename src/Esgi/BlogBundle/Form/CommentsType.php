<?php

namespace Esgi\BlogBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

use Esgi\BlogBundle\DataTransformer\PostIdDataTransformer;

class CommentsType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $entityManager = $options['em'];
        $transformer = new PostIdDataTransformer($entityManager);

        $builder
            //->add('created')
            //->add('updated')
            ->add(
                $builder->create('post', 'hidden')
                    ->addModelTransformer($transformer)
            )
            ->add('commentTitle')
            ->add('commentContent')
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Esgi\BlogBundle\Entity\Comments',
        ));


        $resolver->setRequired(array(
            'em',
        ));

        $resolver->setAllowedTypes(array(
            'em' => 'Doctrine\Common\Persistence\ObjectManager',
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'esgi_blogbundle_comments';
    }
}
