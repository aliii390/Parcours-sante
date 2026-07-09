<?php

namespace App\Form;

use App\Entity\PriseMedicament;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PriseMedicamentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('heurePrevue', TimeType::class, [
                'widget' => 'single_text',
                'label' => 'Heure de prise',
            ])
            ->add('nombreComprimes', IntegerType::class, [
                'label' => 'Nombre de comprimés',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => PriseMedicament::class,
        ]);
    }
}