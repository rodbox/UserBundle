<?php

namespace RB\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Translation\Translator;

use FOS\UserBundle\Util\LegacyFormHelper;

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
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
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
          $lang = 'fr';
        $trans = new translator($lang);
        $constraintsOptions = array(
            'message' => 'fos_user.current_password.invalid',
        );
        $builder
           
             ->add('username',TextType::class,array(

                // 'data'=>'Jacquemin',
                'label'=>'label.username',
                'attr' => array(
                    'placeholder'   => 'label.Username',
                    'class'         => 'form-control '
                    )
                ))
             ->add('email', LegacyFormHelper::getType('Symfony\Component\Form\Extension\Core\Type\EmailType'), array('label' => 'form.email', 'translation_domain' => 'FOSUserBundle'))
            ->add('plainPassword', LegacyFormHelper::getType('Symfony\Component\Form\Extension\Core\Type\RepeatedType'), array(
                'type' => LegacyFormHelper::getType('Symfony\Component\Form\Extension\Core\Type\PasswordType'),
                'options' => array('translation_domain' => 'FOSUserBundle'),
                'first_options' => array('label' => 'form.password','attr'=>['class'=>'form-control']),
                'second_options' => array('label' => 'form.password_confirmation','attr'=>['class'=>'form-control']),
                'invalid_message' => 'fos_user.password.mismatch',
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
            ->add('lastname',TextType::class,array(

                // 'data'=>'Jacquemin',
                'label'=>'label.UserLastname',
                'attr' => array(
                    'placeholder'   => 'label.UserLastname',
                    'class'         => 'form-control'
                    )
                ))
            ->add('email',TextType::class,array(

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
