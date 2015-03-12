<?php
// src/Esgi/BlogBundle/Admin/PostAdmin.php

namespace Esgi\BlogBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class PostAdmin extends Admin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('post_title', 'text', array('label' => 'Post Title'))
            ->add('post_content', 'text', array('label' => 'Post Content'))
            ->add('post_status', 'text', array('label' => 'Post Status'))
            ->add('comments_allowed', 'text', array('label' => 'Comments Allowed'))
            ->add('post_image', 'text', array('label' => 'Post Image'))
            ->add('post_slug', 'text', array('label' => 'Post Slug'))
        ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('id')
            ->add('postTitle')
            ->add('postStatus')
        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id')
            ->add('postTitle')
            ->add('postStatus')
            ->add('postContent')
        ;
    }
}