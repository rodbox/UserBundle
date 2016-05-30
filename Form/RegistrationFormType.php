<?php

namespace RB\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Translation\Translator;

use Symfony\Component\Form\Extension\Core\Type\ButtonType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DatetimeType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

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
            ->add('UserType', ChoiceType::class, [
                'choices'   => [
                    $trans->trans('msg.perso')    => $trans->trans('msg.perso'),
                    $trans->trans('msg.buisness') => $trans->trans('msg.buisness')
                ],
                'data'=>$trans->trans('msg.perso'),
                'label'=> 'label.UserType',
                'attr' => [
                    // 'placeholder'   => 'label.UserType',
                    'class'             =>' '
                ],
                'expanded'  => true,
                'multiple'  => false
                ])
            ->add('UserBusinessName',TextType::class,[
                'label'    =>'label.UserBusinessName',
                'required' =>false,
                'attr'     => [
                    // 'placeholder'   => 'label.UserBusinessName',
                    'class'         => 'form-control'
                    ]
                ])
            ->add('username',TextType::class,[
                'label' =>$trans->trans('label.username'),
                'attr'  => [
                    'class'         => 'form-control'
                    ]
                ])
            ->add('email',EmailType::class,[
                'label' =>$trans->trans('label.email'),
                'attr'  => [
                    'class'         => 'form-control'
                    ]
                ])

            ->add('UserLastname',TextType::class,[
                'label' =>'label.UserLastname',
                'attr'  => [
                    // 'placeholder'   => 'label.UserLastname',
                    'class'         => 'form-control'
                    ]
                ])
            ->add('UserFirstname',TextType::class,[
                'label' =>'label.UserFirstname',
                'attr'  => [
                    // 'placeholder'   => 'label.UserFirstname',
                    'class'         => 'form-control'
                    ]
                ])

            ->add('UserAdress',TextType::class,[
                'label' =>'label.UserAdress',
                'attr'  => [
                    // 'placeholder'   => 'label.UserAdress',
                    'class'         => 'form-control'
                    ]
                ])
            ->add('UserCountry',CountryType::class,[
                'label' =>'label.UserCountry',
                'data' =>'FR',
                "attr"  => [
                    "class" => "form-control select-2"
                ]
            ])
            ->add('UserCP',TextType::class,[
                'label' =>'label.UserCP',
                'attr'  => [
                    // 'placeholder'   => 'label.UserCP',
                    'class'         => 'form-control'
                    ]
                ])

            ->add('UserCity',TextType::class,[
                'label'=>'label.UserCity',
                'attr' => [
                    // 'placeholder'   => 'label.UserCity',
                    'class'         => 'form-control'
                    ]
                ])


            ->add('UserTel',TextType::class,[
                'label'    =>'label.UserTel',
                'required' =>false,
                'attr'     => [
                    // 'placeholder'   => 'label.UserTel',
                    'class'         => 'form-control'
                    ]
            ])
             ->add('Enregistrer', SubmitType::class, array(
                            'attr' => array(
                                'class' => 'save btn btn-success',
                                'type' => 'submit',
                                'value'=>''
                            ),
                        ))

        ;
    }

public function getParent()
    {
        return 'FOS\UserBundle\Form\Type\RegistrationFormType';
    }


    public function getBlockPrefix()
    {
        return 'rb_user_registration';
    }

    // For Symfony 2.x
    public function getName()
    {
        return $this->getBlockPrefix();
    }


}
