<?php

namespace App\Controller\Admin;

use App\Entity\PolitiqueConf;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use FOS\CKEditorBundle\Form\Type\CKEditorType;

class PolitiqueConfCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return PolitiqueConf::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('une politique de confidentialité')
            ->setEntityLabelInPlural('Liste des politiques de confidentialité')
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
                'label' => 'politique de confidentialité'
            ]),
            TextareaField::new('description', 'politique de confidentialité')
            ->setFormType(CKEditorType::class)
            ->hideOnForm()
            ->renderAsHtml(),
        ];
    }
}
