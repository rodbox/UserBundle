<?php

namespace RB\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Translation\Translator;
class ProfileFormType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    { $trans = new translator("fr");
        $builder
            ->add('UserType', 'choice', array(

                'choices'   => array('perso'=>$trans->trans('msg.perso'),'buisness'=>$trans->trans('msg.buisness')),

                'label'=>'label.UserType',
                'attr' => array(
                    'placeholder'   => 'label.UserType',
                    'class'             =>' '
                ),
                'expanded'  => true,
                'multiple'  => false
                ))
            ->add('username','text',array(

                // 'data'=>'Jacquemin',
                'label'=>$trans->trans('label.username'),
                'attr' => array(
                    'placeholder'   => $trans->trans('label.username'),
                    'class'         => 'form-control'
                    )
                ))
            ->add('UserLastname','text',array(

                // 'data'=>'Jacquemin',
                'label'=>'label.UserLastname',
                'attr' => array(
                    'placeholder'   => 'label.UserLastname',
                    'class'         => 'form-control'
                    )
                ))
            ->add('UserFirstname','text',array(
                // 'data'=>'Rodolphe',
                'label'=>'label.UserFirstname',
                'attr' => array(
                    'placeholder'   => 'label.UserFirstname',
                    'class'         => 'form-control'
                    )
                ))
           
            ->add('UserAdress','text',array(
                // 'data'=>'Place de la République',
                'label'=>'label.UserAdress',
                'attr' => array(
                    'placeholder'   => 'label.UserAdress',
                    'class'         => 'form-control'
                    )
                ))
            ->add('UserSkype','text',array(
                // 'data'=>'75010',
                'label'=>'label.UserSkype',
                                'required'=>false,
                'attr' => array(
                    'placeholder'   => 'label.UserSkype',
                    'class'         => 'form-control'
                    )
                ))
            ->add('UserCP','text',array(
                // 'data'=>'75010',
                'label'=>'label.UserCP',
                'attr' => array(
                    'placeholder'   => 'label.UserCP',
                    'class'         => 'form-control'
                    )
                ))
            ->add('UserBusinessName','text',array(
                // 'data'=>'75010',
                'label'=>'label.UserBusinessName',
                'required'=>false,
                'attr' => array(
                    'placeholder'   => 'label.UserBusinessName',
                    'class'         => 'form-control'
                    )
                ))
            ->add('UserCity','text',array(
                // 'data'=>'Paris',
                'label'=>'label.UserCity',
                'attr' => array(
                    'placeholder'   => 'label.UserCity',
                    'class'         => 'form-control'
                    )
                ))
            ->add('UserCountry','country',array(
                'data'=>'FR',
                'label'=>'label.UserCountry',

                "attr" => array(
                    'placeholder'=>'label.UserCountry',
                    "class" => "form-control select-2"
                )
            ))
           
            ->add('UserTel','text',array(
                'label'=>'label.UserTel',
                'required'=>false,
                'attr' => array(
                    'placeholder'   => 'label.UserTel',
                    'class'         => 'form-control'
                    )
            ))
            
        ;
    }
    
public function getParent()
    {
        return 'fos_user_profile';
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'rb_user_profile';
    }
}