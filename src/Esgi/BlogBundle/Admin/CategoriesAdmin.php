<?php
// src/Esgi/BlogBundle/Admin/CategoriesAdmin.php

namespace Esgi\BlogBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class CategoriesAdmin extends Admin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {

        $formMapper
            ->add('categoryName', 'text', array('label' => 'Category Name'))
            ->add('categorySlug', 'text', array('label' => 'Category Slug'))
            ->add('categoryIncludeInMenu', 'choice', array(
                    'choices' => array(
                        '0' => 'No',
                        '1' => 'Yes',
                    )
                )
            )
            ->end()
            ->with('Posts')
            ->add('posts')
            ->end()
        ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('id')
            ->add('categoryName')
            ->add('categorySlug')
            ->add('categoryIncludeInMenu')
        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id')
            ->add('categoryName')
            ->add('categorySlug')
            ->add('categoryIncludeInMenu')
            ->add('_action', 'actions', array(
                'actions' => array(
                    'view' => array(),
                    'edit' => array(),
                    'delete' => array(),
                )
            ));
    }

    // Fields to be shown on view's page
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('categoryName')
            ->add('categorySlug')
            ->add('categoryIncludeInMenu')
        ;
    }
}