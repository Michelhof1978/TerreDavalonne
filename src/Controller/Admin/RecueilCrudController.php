<?php

namespace App\Controller\Admin;

use App\Entity\Recueil;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class RecueilCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Recueil::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('un mot/histoire botanique')
            ->setEntityLabelInPlural('Liste des mots/histoires botanique')
            ->setSearchFields(['typeRecueil', 'word'])
            ->setDefaultSort(['typeRecueil' => 'ASC', 'word' => 'ASC']);
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            AssociationField::new('typeRecueil')
                ->setLabel('mot ou histoire'),
            TextField::new('word')
                ->setLabel('expression'),
            TextField::new('presentation')
                ->setLabel('quelques mots de présentation'),
            TextField::new('lienVideo')
                ->setLabel('lien vidéo'),
        ];
    }
}
