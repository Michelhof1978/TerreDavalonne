<?php

namespace App\Controller\Admin;

use App\Entity\MagieVerte;
use App\Entity\MagieVerteImage;
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

class MagieVerteCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return MagieVerte::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('un contenu magie verte')
            ->setEntityLabelInPlural('Liste des contenus magie verte')
            ->addFormTheme('@FOSCKEditor/Form/ckeditor_widget.html.twig');
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('name')
                ->setLabel('nom de la magie verte'),
            AssociationField::new('elementBase')
                ->setLabel('élément base'),
            AssociationField::new('elementPhyto')
                ->setLabel('élément phytosanitaire'),
            AssociationField::new('elementSabbat')
                ->setLabel('élément sabbat'),
            AssociationField::new('images')
                ->setLabel('ajouter une image')
                ->setCrudController(MagieVerteImage::class),
            TextareaField::new('description', 'description de la magie verte')
                ->setFormType(CKEditorType::class)
                ->hideOnIndex(),
            TextareaField::new('description', 'description de la magie verte')
                ->setFormType(CKEditorType::class)
                ->hideOnForm()
                ->renderAsHtml(),
            UrlField::new('videoHeader')
                ->setLabel('vidéo d\'entête de la Magie Verte'),
            AssociationField::new('options')
                ->setLabel('liste des contenus'),
            DateTimeField::new('created_at')
                ->hideOnForm()
                ->setLabel('date de création'),
            DateTimeField::new('update_at')
                ->hideOnForm()
                ->setLabel('date de modification'),
            ImageField::new('imageHeader')
                ->setLabel('ajouter une photo d\'entête de la Magie Verte')
                ->setBasePath('images/magievertes')
                ->setUploadDir('public/images/magievertes/'),
        ];
    }

    public function persistEntity(
        EntityManagerInterface $entityManager,
        $entityInstance
    ): void {
        if (!$entityInstance instanceof MagieVerte) return;

        $entityInstance->setCreatedAt(new DateTimeImmutable());

        parent::persistEntity($entityManager, $entityInstance);
    }

    public function updateEntity(EntityManagerInterface $entityManager, $entityInstance): void
    {
        if (!$entityInstance instanceof MagieVerte) return;

        $entityInstance->setUpdateAt(new DateTimeImmutable());

        parent::persistEntity($entityManager, $entityInstance);
    }
}
