<?php

namespace App\Form\Univertuel\Prophecy\Game\Stat;

use App\Entity\Univertuel\Prophecy\Game\Stat\Age;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class AgeFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('code', TextType::class)
            ->add('minVal', NumberType::class)
            ->add('maxVal', NumberType::class)
            ->add('attribute1', NumberType::class)
            ->add('attribute2', NumberType::class)
            ->add('attribute3', NumberType::class)
            ->add('attribute4', NumberType::class)
            ->add('submit', SubmitType::class)
          
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Age::class,
        ]);
    }
}
