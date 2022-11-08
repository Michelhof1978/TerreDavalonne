<?php

namespace App\Form;

use App\Entity\DiffusionNewsletter;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue as ConstraintsIsTrue;

class DiffusionNewsletterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class, [
                'required' => true,
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Votre adresse mail',
                    'pattern' => '^([w-.]+)@((?:[w]+.)+)([a-zA-Z]{2,4})'
                ]
            ])
           /* ->add('is_rgpd', CheckboxType::class, [
                'constraints' => [
                    new ConstraintsIsTrue([
                        'message' => 'Vous devez accepter la collecte de vos données personnelles'
                    ])
                ],
                'label_attr' => [
                    'class' => 'checkbox-inline',
                ],
                'label' => 'J\'accepte la collecte de mes données personnelles'
            ])*/
            ->add('enregistrer', SubmitType::class, [
                'attr' => [
                    'class' => 'submit px-4'
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => DiffusionNewsletter::class,
        ]);
    }
}
