<?php

namespace Esgi\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;



class RegistrationFormType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username', 'text', array('label' => 'Nom utilisateur', 'translation_domain' => 'FOSUserBundle','attr' => array('class' => 'form-control')))
            ->add('email', 'email', array('label' => 'Email', 'translation_domain' => 'FOSUserBundle' ,'attr' => array('class' => 'form-control')))

            //->add('profilePictureFile', 'file', array('label' => 'Image de Profile'))
            //->add('fonction', 'text', array('label' => 'Fonction Occupé','attr' => array('class' => 'form-control')))
            ->add('plainPassword', 'repeated', array(
                'type' => 'password',
                'options' => array('translation_domain' => 'FOSUserBundle'),
                'first_options' => array('label' => 'Mot de passe','attr' => array('class' => 'form-control')),
                'second_options' => array('label' => 'Confirmation mot de passe','attr' => array('class' => 'form-control')),
                'invalid_message' => 'fos_user.password.mismatch',
            ))
            /*->add('roles', 'collection', array(
                    'type' => 'choice',
                    'options' => array(
                        'label' => false,
                        'choices' => array(
                            'ROLE_USER' => 'User',
                            'ROLE_ADMIN' => 'Admin'
                        )
                    )
                )
            )*/;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'esgi_userbundle_user';
    }
}
