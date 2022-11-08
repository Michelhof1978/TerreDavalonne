<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DateCoachingForm extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('date', DateType::class, [
                'label' => 'Date',
                'required' => false,
            ])
            ;
    }

    public function setDefaults(OptionsResolver $optionsResolver)
    {
        $optionsResolver->setDefaults([
            'method' => 'GET',
            'crsf_protect' => false
        ]);
    }

    public function getBlockPrefix(): string
    {
        return '';
    }

}
