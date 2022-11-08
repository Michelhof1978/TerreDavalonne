<?php

namespace App\Controller\Admin;

use App\Entity\ReponseGoldBook;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ReponseGoldBookCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ReponseGoldBook::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('une réponse à un mot du livre d\'or')
            ->setEntityLabelInPlural('Liste des réponses aux mots du livre d\'or')
        ;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('reponse'),
            DateTimeField::new('created_at')->hideOnForm(),
            AssociationField::new('goldBookId')->hideOnForm(),
            AssociationField::new('userId')->hideOnForm(),
        ];
    }
}
