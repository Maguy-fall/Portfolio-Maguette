<?php

namespace App\Form;

use App\Entity\Competences;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class CompetencesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom',TextType::class, ['required' => true, 'label' => 'Competence', 'attr' => ['placeholder' => 'Anglais']])
            ->add('type',TextType::class, ['required' => true, 'label' => 'Type', 'attr' => ['placeholder' => 'Technologie, Frameworks ou CMS']])
            ->add('save', SubmitType::class, ['label' => 'Valider']); 
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Competences::class,
            
        ]);
    }
}
