<?php

namespace App\Controller\Admin;

use App\Entity\QuiSommesNous;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use FOS\CKEditorBundle\Form\Type\CKEditorType;

class QuiSommesNousCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return QuiSommesNous::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('un Qui sommes nous ?')
            ->setEntityLabelInPlural('Liste des Qui sommes nous ?')
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
                'label' => 'qui sommes nous ?'
            ]),
            TextareaField::new('description', 'qui sommes nous ?')
            ->setFormType(CKEditorType::class)
            ->hideOnForm()
            ->renderAsHtml(),
        ];
    }
}
