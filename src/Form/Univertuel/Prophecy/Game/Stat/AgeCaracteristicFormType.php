<?php

namespace App\Form\Univertuel\Prophecy\Game\Stat;

use App\Entity\Univertuel\Prophecy\Game\Stat\AgeCaracteristic;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\Univertuel\Prophecy\Game\Stat\Age;
use App\Entity\Univertuel\Prophecy\Game\Stat\Caracteristic;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class AgeCaracteristicFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('age', EntityType::class, [
                'class' => Age::class,
                'choice_label' => 'code',
                'multiple' => false,
                'expanded' => false,
            ])
            ->add('caracteristic', EntityType::class, [
                'class' => Caracteristic::class,
                'choice_label' => 'name',
                'multiple' => false,
                'expanded' => false,
            ])
            ->add('modification', NumberType::class)
            ->add('submit', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => AgeCaracteristic::class,
        ]);
    }
}
