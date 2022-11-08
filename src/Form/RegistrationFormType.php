<?php

namespace App\Form;

use App\Entity\Profession;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('civility', ChoiceType::class, [
                'label' => 'civilité',

                'choices' => [
                    'Monsieur' => 'Monsieur',
                    'Madame' => 'Madame',
                ]
            ])
            ->add('Firstname', TextType::class, [
                'required' => true,
                'label' => 'Prénom'
            ])
            ->add('lastname', TextType::class, [
                'required' => true,
                'label' => 'Nom'
            ])
            ->add('birthday', TextType::class, [
                'label' => 'Date de naissance (jj/mm/SSAA)',
                'attr' => ['pattern' => '^(0?[1-9]|[12][0-9]|3[01])[-/.](0?[1-9]|1[012])[-/.](19|20)\\d\\d$']
            ])
            ->add('professionId', EntityType::class, [
                'label' => 'Profession',
                'placeholder' => 'Choisissez une option',
                'class' => Profession::class,
                'choice_label' => 'name',
                'multiple' => false,
                'expanded' => false,
                'by_reference' => true,
            ])
            ->add('address', TextType::class, [
                'required' => true,
                'label' => 'Adresse',
            ])
            ->add('zip', TextType::class, [
                'required' => true,
                'label' => 'Code postal',
                'attr' => ['maxlength' => 5, 'pattern' => '^[0-9]{1,6}$']
            ])
            ->add('city', TextType::class, [
                'required' => true,
                'label' => 'Ville',
            ])
            ->add('country', TextType::class, [
                'required' => true,
                'label' => 'Pays',
            ])
            ->add('phone', TextType::class, [
                'label' => 'Numèro de téléphone',
                'attr' => ['pattern' => '^(?:(?:\+|00)33|0)\s*[1-9](?:[\s.-]*\d{2}){4}']
            ])
            ->add('email', EmailType::class, [
                'required' => true,
                'attr' => ['pattern' => '^([w-.]+)@((?:[w]+.)+)([a-zA-Z]{2,4})']
            ])
            ->add('agreeTerms', CheckboxType::class, [
                'required' => true,
                'label' => 'Je suis en accord avec les conditions du site',
                'mapped' => false,
                'constraints' => [
                    new IsTrue([
                        'message' => 'You should agree to our terms.',
                    ]),
                ],
            ])
            ->add('plainPassword', PasswordType::class, [
                // instead of being set onto the object directly,
                // this is read and encoded in the controller
                'mapped' => false,
                'attr' => ['autocomplete' => 'new-password'],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter a password',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Your password should be at least {{ limit }} characters',
                        // max length allowed by Symfony for security reasons
                        'max' => 4096,
                    ]),
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
