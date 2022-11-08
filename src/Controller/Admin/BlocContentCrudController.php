<?php

namespace App\Controller\Admin;

use App\Entity\BlocContent;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\UrlField;
use FOS\CKEditorBundle\Form\Type\CKEditorType;

class BlocContentCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return BlocContent::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('contenu d\'un bloc')
            ->setEntityLabelInPlural('Liste des contenus des blocs')
            ->setSearchFields(['sectionId', 'title'])
            ->setDefaultSort(['sectionId' => 'ASC', 'title' => 'ASC'])
            ->addFormTheme('@FOSCKEditor/Form/ckeditor_widget.html.twig');
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            AssociationField::new('sectionId')
                ->setLabel('nom de la section'),
            AssociationField::new(('typeBloc'))
                ->hideOnForm()
                ->hideOnDetail()
                ->hideOnIndex(),
            TextField::new('title')
                ->setLabel('titre du contenu')
                ->setRequired(true),
            UrlField::new('lienImage')
                ->setLabel('lien d\'une image'),
            UrlField::new('lienVideo')
                ->setLabel('lien d\'une vidéo'),
            TextareaField::new('text', 'texte')
                ->setFormType(CKEditorType::class)
            //AssociationField::new('blocContentAttachement'),
        ];
    }
}
