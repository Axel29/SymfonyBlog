<?php
// src/Esgi/BlogBundle/Admin/CommentAdmin.php


namespace Esgi\BlogBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class CommentAdmin extends Admin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with('Posts')
            ->add('post')
            ->end()
            ->add('commentTitle')
            ->add('commentContent', 'textarea', array('attr' => array('class' => 'tinymce')))
            ->add('commentApprouved', 'choice', array(
                    'choices' => array(
                        '0' => 'Disapprouved',
                        '1' => 'Approuved',
                    ),
                )
            )
        ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('commentTitle')
            ->add('commentContent')
            ->add('commentApprouved', 'doctrine_orm_choice', array(), 'choice', array(
                    'choices' => array(
                        '0' => 'Disapprouved',
                        '1' => 'Approuved',
                    ),
                )
            )
            ->add('created');
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id')
            ->add('commentTitle')
            ->add('commentContent')
            ->add('created')
            ->add('commentApprouved', 'choice', array(
                    'choices' => array(
                        '0' => 'Disapprouved',
                        '1' => 'Approuved',
                    ),
                )
            )
            ->add('_action', 'actions', array(
                'actions' => array(
                    'view' => array(),
                    'edit' => array(),
                    'delete' => array(),
                ),
            ));
    }

    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('commentTitle')
            ->add('commentContent')
            ->add('created')
        ;
    }
}
