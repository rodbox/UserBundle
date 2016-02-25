<?php

namespace RB\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Translation\Translator;

class RegistrationFormType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $trans = new translator("fr");

        $builder
            ->add('UserType', 'choice', [
                'choices'   => [
                    'perso'    => $trans->trans('msg.perso'),
                    'buisness' => $trans->trans('msg.buisness')
                ],
                'label'=> 'label.UserType',
                'attr' => [
                    // 'placeholder'   => 'label.UserType',
                    'class'             =>' '
                ],
                'expanded'  => true,
                'multiple'  => false
                ])
            ->add('username','text',[
                'label' =>$trans->trans('label.username'),
                'attr'  => [
                    // 'placeholder'   => $trans->trans('label.username'),
                    'class'         => 'form-control'
                    ]
                ])
            ->add('UserLastname','text',[
                'label' =>'label.UserLastname',
                'attr'  => [
                    // 'placeholder'   => 'label.UserLastname',
                    'class'         => 'form-control'
                    ]
                ])
            ->add('UserFirstname','text',[
                'label' =>'label.UserFirstname',
                'attr'  => [
                    // 'placeholder'   => 'label.UserFirstname',
                    'class'         => 'form-control'
                    ]
                ])

            ->add('UserAdress','text',[
                'label' =>'label.UserAdress',
                'attr'  => [
                    // 'placeholder'   => 'label.UserAdress',
                    'class'         => 'form-control'
                    ]
                ])
            ->add('UserSkype','text',[
                'label'    =>'label.UserSkype',
                'required' =>false,
                'attr'     => [
                    // 'placeholder'   => 'label.UserSkype',
                    'class'         => 'form-control'
                    ]
                ])
            ->add('UserCP','text',[
                'label' =>'label.UserCP',
                'attr'  => [
                    // 'placeholder'   => 'label.UserCP',
                    'class'         => 'form-control'
                    ]
                ])
            ->add('UserBusinessName','text',[
                'label'    =>'label.UserBusinessName',
                'required' =>false,
                'attr'     => [
                    // 'placeholder'   => 'label.UserBusinessName',
                    'class'         => 'form-control'
                    ]
                ])
            ->add('UserCity','text',[
                'label'=>'label.UserCity',
                'attr' => [
                    // 'placeholder'   => 'label.UserCity',
                    'class'         => 'form-control'
                    ]
                ])
            ->add('UserCountry','country',[
                'label' =>'label.UserCountry',
                "attr"  => [
                    "class" => "form-control select-2"
                ]
            ])

            ->add('UserTel','text',[
                'label'    =>'label.UserTel',
                'required' =>false,
                'attr'     => [
                    // 'placeholder'   => 'label.UserTel',
                    'class'         => 'form-control'
                    ]
            ])

        ;
    }

public function getParent()
    {
        return 'fos_user_registration';
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'rb_user_registration';
    }
}
