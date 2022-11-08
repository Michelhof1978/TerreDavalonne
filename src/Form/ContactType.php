<?php

namespace App\Form;

use App\Entity\Contact;
use App\Entity\ThemeContactezNous;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('theme',EntityType::class, [
                'class' => ThemeContactezNous::class,
                'choice_label' => 'name',
                'multiple' => false,
                'expanded' => false,
                'by_reference' => true,
            ])
            ->add('name',TextType::class, [
                'required' => true,
                'label' => 'Nom'
            ])
            ->add('email',EmailType::class, [
                'required' => true,
                'attr' => ['pattern' => '^([w-.]+)@((?:[w]+.)+)([a-zA-Z]{2,4})']
            ])
            ->add('message', TextareaType::class, [
                'attr' => ['rows' => 6],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            Contact::class
        ]);
    }
}
