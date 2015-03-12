<?php

namespace Esgi\BlogBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PostsType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('user')
            ->add('postCreatedAt')
            ->add('postUpdatedAt')
            ->add('postTitle')
            ->add('postContent')
            ->add('postStatus')
            ->add('commentsAllowed')
            ->add('commentsCount')
            ->add('postImage')
            ->add('postSlug')
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Esgi\BlogBundle\Entity\Posts',
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'esgi_blogbundle_posts';
    }
}
