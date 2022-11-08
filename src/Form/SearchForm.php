<?php

namespace App\Form;

use App\Data\SearchData;
use App\Entity\ElementBase;
use App\Entity\ElementPhyto;
use App\Entity\ElementSabbat;
use App\Entity\RecetteType;
use App\Entity\Type;
use App\Entity\TypeRecueil;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SearchForm extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('q', TextType::class, [
                'label' => false,
                'required' => false,
                'attr' => [
                    'placeholder' => 'Rechercher'
                ]
            ])
            ->add('elementBases', EntityType::class, [
                'label' => false,
                'required' => false,
                'class' => ElementBase::class,
                'expanded' => true,
                'multiple' => true,
            ])
            ->add('elementPhytos', EntityType::class, [
                'label' => false,
                'required' => false,
                'class' => ElementPhyto::class,
                'expanded' => true,
                'multiple' => true,
            ])
            ->add('elementSabbats', EntityType::class, [
                'label' => false,
                'required' => false,
                'class' => ElementSabbat::class,
                'expanded' => true,
                'multiple' => true,
            ])
            ->add('min', NumberType::class, [
                'label' => false,
                'required' => false,
                'attr' => [
                    'placeholder' => 'Prix minimum'
                ]
            ])
            ->add('max', NumberType::class, [
                'label' => false,
                'required' => false,
                'attr' => [
                    'placeholder' => 'Prix maximum'
                ]
            ])
            ->add('promo', CheckboxType::class, [
                'label' => 'En promotion',
                'required' => false,
            ])
            ->add('typeRecueil', EntityType::class, [
                'label' => false,
                'required' => false,
                'class' => TypeRecueil::class,
                'expanded' => true,
                'multiple' => true,
            ])
            ->add('typeRecette', EntityType::class, [
                'label' => false,
                'required' => false,
                'class' => RecetteType::class,
                'expanded' => true,
                'multiple' => true,
            ])
            ->add('type', EntityType::class, [
                'label' => false,
                'required' => false,
                'class' => Type::class,
                'expanded' => true,
                'multiple' => true,
            ])
            ;
    }

    public function setDefaults(OptionsResolver $optionsResolver)
    {
        $optionsResolver->setDefaults([
            'data-class' => SearchData::class,
            'method' => 'GET',
            'crsf_protect' => false
        ]);
    }

    public function getBlockPrefix(): string
    {
        return '';
    }

}
