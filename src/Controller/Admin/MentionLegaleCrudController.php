<?php

namespace App\Controller\Admin;

use App\Entity\MentionLegale;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use FOS\CKEditorBundle\Form\Type\CKEditorType;

class MentionLegaleCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return MentionLegale::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('une mention légale')
            ->setEntityLabelInPlural('Liste des mentions légales')
            ->addFormTheme('@FOSCKEditor/Form/ckeditor_widget.html.twig')
        ;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextEditorField::new('description')
            ->setFormType(CKEditorType::class)
            ->hideOnIndex()
            ->setFormTypeOptions([
                'label' => 'Mentions légales'
            ]),
            TextareaField::new('description', 'Mentions légales')
            ->setFormType(CKEditorType::class)
            ->hideOnForm()
            ->renderAsHtml(),
        ];
    }
}
