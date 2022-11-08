<?php

namespace App\Controller\Admin;

use App\Entity\Commande;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;

class CommandeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Commande::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('une commande')
            ->setEntityLabelInPlural('Liste des commandes')
            ->setSearchFields(['statut'])
            ->setDefaultSort(['statut' => 'DESC'])
        ;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            AssociationField::new('statut')
                ->setLabel('statut de la commande'),
            AssociationField::new('user')
                ->setLabel('client'),
            AssociationField::new('ligneCommande')
                ->setLabel('nombre de ligne de commande')
        ];
    }
}
