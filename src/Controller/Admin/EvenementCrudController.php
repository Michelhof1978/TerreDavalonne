<?php

namespace App\Controller\Admin;

use App\Entity\Evenement;
use DateTimeImmutable;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\UrlField;
use FOS\CKEditorBundle\Form\Type\CKEditorType;

class EvenementCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Evenement::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('un événement')
            ->setEntityLabelInPlural('Liste des événements')
            ->setSearchFields(['type', 'dateDebutEvenement'])
            ->setDefaultSort(['dateDebutEvenement' => 'DESC'])
            ->addFormTheme('@FOSCKEditor/Form/ckeditor_widget.html.twig');
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            AssociationField::new('type')
                ->setLabel('type de l\'événement'),
            AssociationField::new('elementbases')
                ->setLabel('élément de base'),
            AssociationField::new('elementPhyto')
                ->setLabel('élément phytosanitaire'),
            AssociationField::new('elementSabbat')
                ->setLabel('élément sabbat'),
            TextField::new('name')
                ->setLabel('nom de l\'événement'),
            UrlField::new('lienPhoto')
                ->setLabel('ajouter une photo'),
            NumberField::new('numberPlace')
                ->setLabel('nombre de place'),
            DateField::new('dateDebutEvenement')
                ->setLabel('date de début'),
            DateField::new('dateFinEvenement')
                ->setLabel('date de fin'),
            MoneyField::new('price')
                ->setLabel('prix')
                ->setCurrency('EUR'),
            TextareaField::new('description', 'description de l\'événement')
                ->setFormType(CKEditorType::class)
        ];
    }

    public function persistEntity(EntityManagerInterface $entityManager, $entityInstance): void
    {
        if (!$entityInstance instanceof Evenement) return;

        $entityInstance->setDateCreation(new DateTimeImmutable());
        parent::persistEntity($entityManager, $entityInstance);
    }
}
