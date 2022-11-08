<?php

namespace App\Controller\Admin;

use App\Entity\Recette;
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

class RecetteCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Recette::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('une recette')
            ->setEntityLabelInPlural('Liste des recettes')
            ->setSearchFields(['typeRecette', 'name'])
            ->setDefaultSort(['typeRecette' => 'ASC'])
            ->addFormTheme('@FOSCKEditor/Form/ckeditor_widget.html.twig');
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            AssociationField::new('typeRecette')
                ->setLabel('type de recette'),
            TextField::new('name')
                ->setLabel('nom de la recette'),
            UrlField::new('lienPhoto')
                ->setLabel('ajouter une photo'),
            TextareaField::new('description', 'description de la recette')
                ->setFormType(CKEditorType::class)
                ->renderAsHtml(),
            UrlField::new('videoHeader')
                ->setLabel('vidéo d\'entête des recettes'),
            ImageField::new('imageHeader')
                ->setLabel('ajouter une photo d\'entête de la recette')
                ->setBasePath('images/recettes')
                ->setUploadDir('public/images/recettes/'),
            DateTimeField::new('created_at')
                ->hideOnForm()
                ->setLabel('date de création'),
            DateTimeField::new('update_at')
                ->hideOnForm()
                ->setLabel('date de modification'),
            AssociationField::new('images')
                ->setLabel('ajouter des images'),
            AssociationField::new('options')
                ->setLabel('liste des contenus'),
        ];
    }

    public function persistEntity(
        EntityManagerInterface $entityManager,
        $entityInstance
    ): void {
        if (!$entityInstance instanceof Recette) return;

        $entityInstance->setCreatedAt(new DateTimeImmutable());

        parent::persistEntity($entityManager, $entityInstance);
    }

    public function updateEntity(EntityManagerInterface $entityManager, $entityInstance): void
    {
        if (!$entityInstance instanceof Recette) return;

        $entityInstance->setUpdateAt(new DateTimeImmutable());

        parent::persistEntity($entityManager, $entityInstance);
    }
}
