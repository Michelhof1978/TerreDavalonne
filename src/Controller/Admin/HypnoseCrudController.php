<?php

namespace App\Controller\Admin;

use App\Entity\Hypnose;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use FOS\CKEditorBundle\Form\Type\CKEditorType;

class HypnoseCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Hypnose::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('un contenu hypnose')
            ->setEntityLabelInPlural('Liste des contenus hypnose')
            ->addFormTheme('@FOSCKEditor/Form/ckeditor_widget.html.twig')
        ;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextareaField::new('description', 'contenu hypnose')
                ->setFormType(CKEditorType::class)
                ->hideOnIndex(),
            TextareaField::new('description', 'contenu hypnose')
                ->setFormType(CKEditorType::class)
                ->hideOnForm()
                ->renderAsHtml(),
        ];
    }
}
