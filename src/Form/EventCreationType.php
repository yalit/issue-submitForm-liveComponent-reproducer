<?php

namespace App\Form;

use App\Entity\DTO\EventCreation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\UX\LiveComponent\Form\Type\LiveCollectionType;

class EventCreationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
            ->add('participants', LiveCollectionType::class, [
                'allow_add' => true,
                'allow_delete' => true,
                'by_reference' => false,
                'entry_type' => EventParticipantInputType::class,

            ]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => EventCreation::class
        ]);
    }
}
