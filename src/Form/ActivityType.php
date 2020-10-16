<?php

namespace App\Form;

use App\Entity\Activity;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ActivityType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'label'=> 'name',
                    'attr'=> [
                        'class' => ""
                    ]
            ])
            ->add('startDate', DateTimeType::class, [
                'label'=> 'startDate',
                    'attr'=> [
                        'class'=>""
                    ]
            ])
            ->add('duration', IntegerType::class, [
                'label' => 'duration',
                    'attr'=> [
                        'class'=> ""
                    ]
            ])
            ->add('endDate', DateTimeType::class, [
                'label'=>'endDate',
                   'attr' => [
                       'class'=>""
                   ]
            ])
            ->add('inscriptionNbMax', NumberType::class, [
                'label' => 'inscriptionMax',
                   'attr' => [
                       'class'=>""
                   ]
            ])
            ->add('descriptionInfo', TextareaType::class, [
                'label'=> 'descriptionInfo',
                'attr' => [
                    'class' => ""
                ]
            ])
            //->add('activityStatut')
            //->add('urlPhoto')
            //->add('organizer')
            //->add('participants')
            ->add('campusA', EntityType::class, [
                'class' => 'App\Entity\Campus',
                   'choice_label' => 'campusName',
                       'attr' => [
                           'class' => ""
                       ]
            ])
            //->add('statusA')
            ->add('cityA', EntityType::class, [
                'class' => 'App\Entity\City',
                   'choice_label' => 'cityName',
                       'attr' => [
                           'class'=> ""
                       ]

    ])
            ->add('placeA', EntityType::class, [
                'class' => 'App\Entity\Place',
                  'choice_label'=> 'placeName',
                   'multiple' => false
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Activity::class,
        ]);
    }
}
