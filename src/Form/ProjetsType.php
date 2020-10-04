<?php

namespace App\Form;

use App\Entity\Projets;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ProjetsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', TextType::class, ['required' => true, 'label' => 'Nom du projet ', 'attr' => ['placeholder' => 'Portfolio']])
            ->add('lien', TextType::class, ['required' => true, 'label' => 'Site du projet ', 'attr' => ['placeholder' => 'https://www.portfolio.com']])
            ->add('description', TextareaType::class, ['required' => true, 'label' => 'Description du projet ', 'attr' => ['placeholder' =>'description courte']])
            ->add('save', SubmitType::class, ['label' => 'Valider']);

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Projets::class,
        ]);
    }
}

