<?php

namespace App\Form\Univertuel\Prophecy\Game\Capacity;

use App\Entity\Univertuel\Prophecy\Game\Capacity\Spell;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\Univertuel\Prophecy\Game\Capacity\MagicDomain;
use App\Entity\Univertuel\Prophecy\Game\Capacity\Discipline;

class SpellFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('code', TextType::class)
            ->add('name', TextType::class)
            ->add('manaCost', NumberType::class)
            ->add('difficulty', NumberType::class)
            ->add('time', TextType::class)
            ->add('spellKeys', TextType::class)
            ->add('effect', TextareaType::class)
            ->add('magicDomain', EntityType::class, [
                'class' => MagicDomain::class,
                'choice_label' => 'code',
                'multiple' => false,
                'expanded' => false
            ])
            ->add('discipline', EntityType::class,[
                'class' => Discipline::class,
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
            'data_class' => Spell::class,
        ]);
    }
}
