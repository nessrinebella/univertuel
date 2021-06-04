<?php

namespace App\Form\Univertuel\Game;

use App\Entity\Univertuel\Game\Game;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\Univertuel\Game\Category;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class NewGameType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('code', TextType::class)
            ->add('name', TextType::class)
            ->add('category', EntityType::class, [
                'multiple' => false,
                'expanded' => false,
                'choice_label' => 'code',
                'class' => Category::class
            ])
            ->add('submit', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Game::class,
        ]);
    }
}
