<?php
// src/Esgi/BlogBundle/Admin/UserAdmin.php

namespace Esgi\BlogBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class UserAdmin extends Admin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $container = $this->getConfigurationPool()->getContainer();
        $userRoles = $container->get('esgi_blogbundle_helper.data')->getUserRoles();

        $formMapper
            ->add('username', 'text', array('label' => 'Username'))
            ->add('email', 'text', array('label' => 'Email'))
            ->add('enabled', 'choice', array(
                    'choices' => array(
                        '0' => 'Disabled',
                        '1' => 'Enabled',
                    )
                )
            )
            ->add('password', 'text', array('label' => 'Password'));
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('id')
            ->add('username')
            ->add('email');
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id')
            ->add('username')
            ->add('email')
            ->add('_action', 'actions', array(
                'actions' => array(
                    'view' => array(),
                    'edit' => array(),
                    'delete' => array(),
                )
            ));
    }
}