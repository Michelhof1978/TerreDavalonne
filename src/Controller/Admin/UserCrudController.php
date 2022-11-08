<?php

namespace App\Controller\Admin;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Mime\Address;
use Symfony\Component\PasswordHasher\Hasher\PasswordHasherFactoryInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use App\Security\EmailVerifier;
use App\Services\MaillerServices;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;

class UserCrudController extends AbstractCrudController
{
    private UserPasswordHasherInterface $passwordHasher;
    private MaillerServices $maillerServices;

    public function __construct(UserPasswordHasherInterface $passwordHasher, MaillerServices $maillerServices)
    {
        $this->passwordHasher = $passwordHasher;
        $this->maillerServices = $maillerServices;
    }

    public static function getEntityFqcn(): string
    {
        return User::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('un administrateur')
            ->setEntityLabelInPlural('Liste des utilisateurs')
            ->setSearchFields(['lastname', 'Firstname'])
            ->setDefaultSort(['lastname' => 'ASC', 'Firstname' => 'ASC'])
        ;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            EmailField::new('email')
                ->setLabel('E-mail'),
            TextField::new('password')
                ->hideOnIndex()
                ->setFormType(PasswordType::class)
                ->setLabel('Mot de passe'),
            ChoiceField::new('civility')
                ->setChoices([
                    'Monsieur' => 'Monsieur',
                    'Madame' => 'Madame',
                ])
                ->setLabel('Civilité'),
            TextField::new('Firstname')
                ->setLabel('Prénom'),
            TextField::new('lastname')
                ->setLabel('Nom de famille'),
            TextField::new('birthday')
                ->setLabel('date de naissance'),
            AssociationField::new('professionId')
                ->setLabel('Profession'),
            TextField::new('address')
                ->setLabel('adresse'),
            IntegerField::new('zip')
                ->setLabel('code postal'),
            TextField::new('city')
                ->setLabel('ville'),
            TextField::new('country')
                ->setLabel('pays'),
            IntegerField::new('phone')
                ->setLabel('Numèro de téléphone'),
        ];
    }

    public function persistEntity(
        EntityManagerInterface $entityManager,
        $entityInstance
    ): void {
        if (!$entityInstance instanceof User) return;

        $encodedPassword = $this->passwordHasher->hashPassword($entityInstance, $entityInstance->getPassword());
        $entityInstance->setPassword($encodedPassword);
        $entityInstance->setRoles(['ROLE_ADMIN']);

        parent::persistEntity($entityManager, $entityInstance);
        // generate a signed url and email it to the user
        $this->maillerServices->sendMailCreateCompte($entityInstance);
    }
}
