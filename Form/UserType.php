<?php

namespace RB\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UserType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('UserLastname')
            ->add('UserFirstname')
            ->add('UserAdress')
            ->add('UserCP')
            ->add('UserCity')
            ->add('UserCountry')
            ->add('UserActive')
            ->add('UserBusinessName')
            ->add('UserDateCrea')
            ->add('UserDateLastConnect')
            ->add('UserDateUpd')
            ->add('UserTel')
            ->add('UserSkype')
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'RB\UserBundle\Entity\User'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'rb_userbundle_user';
    }
}
