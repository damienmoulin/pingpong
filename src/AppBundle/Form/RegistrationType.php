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

class RegistrationType extends  AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
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