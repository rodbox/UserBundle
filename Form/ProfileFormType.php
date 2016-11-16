<?php

namespace RB\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Translation\Translator;

use FOS\UserBundle\Util\LegacyFormHelper;
use Symfony\Component\Security\Core\Validator\Constraints\UserPassword;

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
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
class ProfileFormType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $lang = 'fr';
        $trans = new translator($lang);
        $constraintsOptions = array(
            'message' => 'fos_user.current_password.invalid',
        );

        if (!empty($options['validation_groups'])) {
            $constraintsOptions['groups'] = array(reset($options['validation_groups']));
        }
        $builder

           
          ->add('current_password', LegacyFormHelper::getType('Symfony\Component\Form\Extension\Core\Type\PasswordType'), array(
            'label' => 'form.current_password',
            'translation_domain' => 'FOSUserBundle',
            'disabled'=>true,
            'mapped' => false,
             'attr' => array(
                    'placeholder'   => 'form.current_password',
                    'class'         => 'form-control hide'
                    ),
            'constraints' => new UserPassword($constraintsOptions)
        ))
            ->add('username',TextType::class,array(
                'disabled'=>true,
                // 'data'=>'Jacquemin',
                'label'=>'label.username',
                'attr' => array(
                    'placeholder'   => 'label.Username',
                    'class'         => 'form-control hide'
                    )
                ))
            ->add('lastname',TextType::class,array(

                // 'data'=>'Jacquemin',
                'label'=>'label.UserLastname',
                'attr' => array(
                    'placeholder'   => 'label.UserLastname',
                    'class'         => 'form-control'
                    )
                ))
            ->add('email',TextType::class,array(
                'disabled'=>true,
                // 'data'=>'Jacquemin',
                'label'=>'label.Email',
                'attr' => array(
                    'placeholder'   => 'label.Email',
                    'class'         => 'form-control'
                    )
                ))


            ->add('firstname',TextType::class,array(
                // 'data'=>'Rodolphe',
                'label'=>'label.UserFirstname',
                'attr' => array(
                    'placeholder'   => 'label.UserFirstname',
                    'class'         => 'form-control'
                    )
                ))

            ->add('birthday',BirthdayType::class,array(
                'required'=>false,
                // 'data'=>'Jacquemin',
                'label'=>'label.birthday',
                 //'widget' => 'single_text',
                'format' => 'dd-MM-yyyy',
                //'input'=>'string',
                'choice_translation_domain'=>$lang,
                'attr' => array(
                    'placeholder'   => 'label.birthday',
                    'class'         => 'form-control'
                    )
                ))
            ->add('adress',TextType::class,array(
                // 'data'=>'Place de la République',
                'required'=>false,
                'label'=>'label.UserAdress',
                'attr' => array(
                    'placeholder'   => 'label.UserAdress',
                    'class'         => 'form-control'
                    )
                ))
           
            ->add('cp',TextType::class,array(
                // 'data'=>'75010',
                'required'=>false,
                'label'=>'label.UserCP',
                'attr' => array(
                    'placeholder'   => 'label.UserCP',
                    'class'         => 'form-control'
                    )
                ))
            ->add('businessName',TextType::class,array(
                // 'data'=>'75010',
                'required'=>false,
                'label'=>'label.UserBusinessName',
                'required'=>false,
                'attr' => array(
                    'placeholder'   => 'label.UserBusinessName',
                    'class'         => 'form-control hide'
                    )
                ))
            ->add('city',TextType::class,array(
                // 'data'=>'Paris',
                'required'=>false,
                'label'=>'label.UserCity',
                'attr' => array(
                    'placeholder'   => 'label.UserCity',
                    'class'         => 'form-control'
                    )
                ))
            ->add('country',CountryType::class,array(
                'data'=>'FR',
                'required'=>false,
                'label'=>'label.UserCountry',

                "attr" => array(
                    'placeholder'=>'label.UserCountry',
                    "class" => "form-control select-2"
                )
            ))

            ->add('tel',TextType::class,array(
                'required'=>false,
                'label'=>'label.UserTel',
                'required'=>false,
                'attr' => array(
                    'placeholder'   => 'label.UserTel',
                    'class'         => 'form-control'
                    )
            ))

             ->add('submit', SubmitType::class, array(
                'label'=>'action.save',
                'attr' => array(
                    'class' => 'save btn btn-success btn-block mct',
                    'type' => 'submit'
                ),
            ))

        ;
    }

public function getParent()
    {
         return 'FOS\UserBundle\Form\Type\ProfileFormType';
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'rb_user_profile';
    }
}