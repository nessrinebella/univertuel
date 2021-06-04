<?php

namespace App\Form\Univertuel\Campaign;

use App\Entity\Univertuel\Campaign\Campaign;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\Univertuel\Game\Game;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class CampaignFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('code', TextType::class)
            ->add('description', TextareaType::class)
            ->add('game', EntityType::class, [
                'class' => Game::class,
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
            'data_class' => Campaign::class,
        ]);
    }
}
