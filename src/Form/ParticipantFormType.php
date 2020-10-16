<?php

namespace App\Form;

use App\Entity\Participant;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ParticipantFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username', TextType::class, [
                'label'=> 'username',
                   'attr' => [
                       'class' => ""
                   ]
            ])
            ->add('surname', TextType::class, [
                'label' => 'surname',
                   'attr' => [
                       'class' => ""
                   ]
            ])
            ->add('firstname', TextType::class, [
                'label' => 'firstname',
                   'attr' => [
                       'class' => ""
                   ]
            ])
            ->add('phone', TextType::class, [
                'label' => 'phone',
                    'attr'=> [
                        'class' => ""
                    ]
            ])
            ->add('mail', EmailType::class, [
                'label'=> 'mail',
                   'attr' => [
                       'class' => ""
                   ]
            ] )
            ->add('password', RepeatedType::class, [
                'type' => PasswordType::class,
                'invalid_message' => 'The password fields must match.',
                'required' => true,
                'first_options'  => ['label' => 'Password'],
                'second_options' => ['label' => 'Repeat Password'],
            ])

            ->add('campusP', EntityType::class, [
                 'class'=> 'App\Entity\Campus',
                    'choice_label'=> 'campusName',
                    'multiple' => false
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Participant::class,
        ]);
    }
}
