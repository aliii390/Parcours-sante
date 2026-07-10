<?php

namespace App\Form;

use App\Entity\Journal;
use App\Entity\Symptome;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class JournalType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('date')
            ->add('note')
            ->add('intensite')
                   ->add('symptome', EntityType::class, [
    'class' => Symptome::class,
    'choice_label' => 'nom',        // ← affiche le nom de la catégorie
    'placeholder' => 'Sélectionnez un symptome',  // ← ajoute l'option vide en haut
    'label' => false,                // ← on gère le label dans le Twig
])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Journal::class,
        ]);
    }
}
