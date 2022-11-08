<?php

namespace App\Controller\Admin;

use App\Entity\BlocContentAttachement;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class BlocContentAttachementCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return BlocContentAttachement::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('contenu attaché à un bloc')
            ->setEntityLabelInPlural('Liste des contenus attachés aux blocs')
            ->setSearchFields(['blocContentId'])
            ->setDefaultSort(['blocContentId' => 'ASC']);
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            AssociationField::new('blocContentId')
                ->setLabel('contenu bloc associé'),
            TextField::new('path')
                ->setLabel('chemin'),
            NumberField::new('size')
                ->setLabel('taille'),
            TextField::new('extention')
                ->setLabel('extention'),
            TextField::new('lien')
                ->setLabel('lien'),
        ];
    }
}
