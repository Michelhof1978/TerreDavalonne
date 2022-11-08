<?php

namespace App\Controller\Admin;

use App\Entity\Plante;
use DateTimeImmutable;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\UrlField;
use FOS\CKEditorBundle\Form\Type\CKEditorType;

class PlanteCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Plante::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('une plante')
            ->setEntityLabelInPlural('Liste des plantes')
            ->setSearchFields(['plante'])
            ->setDefaultSort(['name' => 'ASC']);
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')
                ->hideOnForm(),
            TextField::new('name')
                ->setLabel('Nom de la plante'),
            TextField::new('latinName')
                ->setLabel('Nom latin de la plante'),
            AssociationField::new('images')
                ->setLabel('ajouter une image')
                ->setCrudController(Image::class),
            AssociationField::new('elementBases')
                ->setLabel('élément base'),
            AssociationField::new('elementPhytos')
                ->setLabel('élément phytosanitaire'),
            AssociationField::new('elementSabbats')
                ->setLabel('élément sabbat'),
            TextareaField::new('description', 'contenu hypnose')
                ->setFormType(CKEditorType::class)
                ->hideOnIndex(),
            TextareaField::new('description', 'contenu hypnose')
                ->setFormType(CKEditorType::class)
                ->hideOnForm()
                ->renderAsHtml(),
            UrlField::new('lienVideo')
                ->setLabel('lien vidéo'),
            DateTimeField::new('created_at')
                ->hideOnForm()
                ->setLabel('date de création'),
            DateTimeField::new('update_at')
                ->hideOnForm()
                ->setLabel('date de modification'),
            ImageField::new('imageHeader')
                ->setLabel('ajouter une photo d\'entête de la plante')
                ->setBasePath('images/plantes')
                ->setUploadDir('public/images/plantes/'),
            UrlField::new('videoHeader')
                ->setLabel('vidéo d\'entête de plante'),
            AssociationField::new('options')
                ->setLabel('liste des contenus'),
        ];
    }

    public function persistEntity(
        EntityManagerInterface $entityManager,
        $entityInstance
    ): void {
        if (!$entityInstance instanceof Plante) return;

        $entityInstance->setCreatedAt(new DateTimeImmutable());

        parent::persistEntity($entityManager, $entityInstance);
    }

    public function updateEntity(EntityManagerInterface $entityManager, $entityInstance): void
    {
        if (!$entityInstance instanceof Plante) return;

        $entityInstance->setUpdateAt(new DateTimeImmutable());

        parent::persistEntity($entityManager, $entityInstance);
    }
}
