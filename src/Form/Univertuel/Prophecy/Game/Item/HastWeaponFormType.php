<?php

namespace App\Form\Univertuel\Prophecy\Game\Item;

use App\Entity\Univertuel\Prophecy\Game\Item\HastWeapon;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\Univertuel\Prophecy\Game\Item\WeaponCategory;

class HastWeaponFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('meleeInitiative', NumberType::class)
            ->add('combatInitiative', NumberType::class)
            ->add('coordinationConstraint', NumberType::class)
            ->add('perceptionConstraint', NumberType::class)
            ->add('flatDommages', NumberType::class)
            ->add('strengthDommages', NumberType::class)
            ->add('multiple', NumberType::class)
            ->add('specialCapacities')
            ->add('category', EntityType::class, [
                'class' => WeaponCategory::class,
                'choice_label' => 'code',
                'multiple' => false,
                'expanded' => false
            ])
            ->add('submit', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => HastWeapon::class,
        ]);
    }
}
