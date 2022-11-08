<?php

namespace App\Controller\Admin;

use App\Entity\FormationNumeric;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\UrlField;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;

class FormationNumericCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return FormationNumeric::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('une formation numérique')
            ->setEntityLabelInPlural('Liste des formations numériques')
            ->setSearchFields(['type', 'name'])
            ->setDefaultSort(['type' => 'DESC', 'name' => 'ASC'])
        ;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            AssociationField::new('type')
                ->setLabel('type de formation'),
            IdField::new('id')
                ->hideOnForm(),
            AssociationField::new('elementBase')
                ->setLabel('element base'),
            AssociationField::new('elementPhyto')
                ->setLabel('élément phytosanitaire'),
            AssociationField::new('elementSabbat')
                ->setLabel('élémenet sabbat'),
            TextField::new('name')
                ->setLabel('nom de la formation'),
            UrlField::new('lienVideo')
                ->setLabel('lien vers la vidéo'),
            MoneyField::new('price')
                ->setLabel('prix')
                ->setCurrency('EUR'),
        ];
    }
}
