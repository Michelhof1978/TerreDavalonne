<?php

namespace App\Controller\Admin;

use App\Entity\ConseilDuNaturo;
use DateTimeImmutable;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\UrlField;

class ConseilDuNaturoCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ConseilDuNaturo::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('un conseil du naturo')
            ->setEntityLabelInPlural('Liste des conseils du naturo')
            ->setSearchFields(['conseil'])
            ->setDefaultSort(['conseil' => 'ASC']);
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')
                ->hideOnForm(),
            TextField::new('conseil')
                ->setLabel('nom du conseil'),
            UrlField::new('lienPhoto')
                ->setLabel('ajouter une photo'),
            AssociationField::new('elementBase')
                ->setLabel('élément base'),
            AssociationField::new('elementPhyto')
                ->setLabel('élément phytosanitaire'),
            AssociationField::new('elementSabbat')
                ->setLabel('élément sabbat'),
            UrlField::new('lienVideo')
                ->setLabel('lien vidéo'),
            DateTimeField::new('created_at')
                ->hideOnForm()
                ->setLabel('date de création'),
            DateTimeField::new('update_at')
                ->hideOnForm()
                ->setLabel('date de modification'),
        ];
    }

    public function persistEntity(
        EntityManagerInterface $entityManager,
        $entityInstance
    ): void {
        if (!$entityInstance instanceof ConseilDuNaturo) return;

        $entityInstance->setCreatedAt(new DateTimeImmutable());

        parent::persistEntity($entityManager, $entityInstance);
    }

    public function updateEntity(EntityManagerInterface $entityManager, $entityInstance): void
    {
        if (!$entityInstance instanceof ConseilDuNaturo) return;

        $entityInstance->setUpdateAt(new DateTimeImmutable());

        parent::persistEntity($entityManager, $entityInstance);
    }
}
