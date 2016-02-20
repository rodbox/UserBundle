<?php

namespace RB\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Translation\Translator;

class PreRegistrationFormType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $trans = new translator("fr");
        $builder
            ->add('UserType', 'choice', array(
                'choices'   => array('buyer'=>$trans->trans('msg.iam.buyer'),'seller'=>$trans->trans('msg.iam.seller')),
   
                'label'=>'label.UserType',
                'attr'=>array('placeholder'=>'label.UserType'),
                'required'  => true,
                'expanded'  => true,
                'multiple'  => false
                ))
            ->add('UserLang', 'choice', array(
                'label'=>'label.UserLang',
                'attr'=>array('placeholder'=>'label.UserLang'),
                'choices'   => array('EN'=>$trans->trans('msg.EN'),'FR'=>$trans->trans('msg.FR')),
                'data'=>'FR',
                'required'  => true,
                'expanded'  => true,
                'multiple'  => false
                ))
            ->add('email', 'email', array(
                'label' => 'form.email',
                'attr'=>array(
                    'class'=>'form-control',
                    'placeholder'=>'label.email'
                )
            ))
            ->add('plainPassword', 'repeated', array(
                'type' => 'password',
                
                'first_options' => array('attr'=>array('class'=>'form-control','placeholder'=>'label.password')),
                'second_options' => array('attr'=>array('class'=>'form-control','placeholder'=>'label.password_confirmation')),
                'invalid_message' => 'fos_user.password.mismatch',
            ))
            
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
