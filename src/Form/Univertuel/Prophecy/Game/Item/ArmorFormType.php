<?php

namespace App\Form\Univertuel\Prophecy\Game\Item;

use App\Entity\Univertuel\Prophecy\Game\Item\Armor;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use App\Entity\Univertuel\Prophecy\Game\Item\ArmorCategory;

class ArmorFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('protection', NumberType::class)
            ->add('strengthConstraint', NumberType::class)
            ->add('resistConstraint', NumberType::class)
            ->add('boundary', NumberType::class)
            ->add('category', EntityType::class, [
                'class' => ArmorCategory::class,
                'choice_label' => 'code'
            ])
            ->add('submit', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Armor::class,
        ]);
    }
}
