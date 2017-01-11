<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class PlayerType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email',TextType::class,
                [
                    'label' => 'Email',
                    'attr' => [ 'placeholder' => '']
                ])
            ->add('firstname',TextType::class,
                [
                    'label' => 'Prénom',
                    'attr' => [ 'placeholder' => '']
                ])
            ->add('lastname',TextType::class,
                [
                    'label' => 'Nom',
                    'attr' => [ 'placeholder' => '']
                ])
            ->add('structure',TextType::class,
                [
                    'label' => 'Structure',
                    'attr' => [ 'placeholder' => '']
                ])
        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Player'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_player';
    }


}
