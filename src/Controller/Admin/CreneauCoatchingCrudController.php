<?php

namespace App\Controller\Admin;

use App\Entity\CreneauCoatching;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TimeField;

class CreneauCoatchingCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return CreneauCoatching::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Créneau de coaching')
            ->setEntityLabelInPlural('Créneaux des coachings')
            ->setSearchFields(['date', 'heureDebut'])
            ->setDefaultSort(['date' => 'ASC', 'heureDebut' => 'ASC'])
        ;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            DateField::new('date'),
            TimeField::new('heureDebut'),
            TimeField::new('heureFin'),
            BooleanField::new('isFree')
                ->setLabel('est libre (oui/non)'),
            AssociationField::new('user')
        ];
    }
}
