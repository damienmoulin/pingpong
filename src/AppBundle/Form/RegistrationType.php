<?php
/**
 * Created by PhpStorm.
 * User: damien
 * Date: 09/01/17
 * Time: 13:36
 */

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use FOS\UserBundle\Util\LegacyFormHelper;


class RegistrationType extends  AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', LegacyFormHelper::getType('Symfony\Component\Form\Extension\Core\Type\EmailType'),
                [
                    'label' => 'Email',
                    'translation_domain' => 'FOSUserBundle'
                ])
            ->add('plainPassword', LegacyFormHelper::getType('Symfony\Component\Form\Extension\Core\Type\RepeatedType'),
                [
                    'type' => LegacyFormHelper::getType('Symfony\Component\Form\Extension\Core\Type\PasswordType'),
                    'options' => array('translation_domain' => 'FOSUserBundle'),
                    'first_options' => array('label' => 'Mot de passe'),
                    'second_options' => array('label' => 'Mot de passe (confirmation)'),
                    'invalid_message' => 'fos_user.password.mismatch',
                ])
            ->add('firstname',TextType::class,
                [
                    'label' => 'Prénom'
                ])
            ->add('lastname',TextType::class,
                [
                    'label' => 'Nom'
                ])
            ->add('structurename',TextType::class,
                [
                    'label' => 'Structure'
                ])
            ->add('structuretype',ChoiceType::class,
                [
                    'choices' =>
                        [
                            'École'  => "École",
                            'Agence' => 'Agence'
                        ],
                    'label' => 'Type de structure'
                ])
            ->add('teamname', TextType::class,
                [
                    'label' => 'Team'
                ])
            ->add('phonenumber', TextType::class,
                [
                    'label' => 'Télephone'
                ])
            ->remove('username')
            ;
    }

    public function getParent()
    {
        return 'FOS\UserBundle\Form\Type\RegistrationFormType';

    }

    public function getBlockPrefix()
    {
        return 'app_user_registration';
    }

    public function getName()
    {
        return $this->getBlockPrefix();
    }
}