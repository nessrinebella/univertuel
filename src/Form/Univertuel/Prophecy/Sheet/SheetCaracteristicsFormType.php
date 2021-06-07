<?php

namespace App\Form\Univertuel\Prophecy\Sheet;

use App\Entity\Univertuel\Prophecy\Sheet\SheetCaracteristics;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\Univertuel\Prophecy\Game\Stat\Caracteristic;
use App\Form\Univertuel\Prophecy\Game\Stat\CaracteristicFormType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class SheetCaracteristicsFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('value', TextType::class)
        ->add('caracteristic', CollectionType::class, [
            'entry_type' => new CaracteristicFormType (),
            'allow_add' => true,

        ])

        ;
        
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
         'data_class' => SheetCaracteristics::class,
         
        ]);
    }
}
