<?php

namespace App\Controller\Admin;

use App\Entity\ConditionGenDeVente;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use FOS\CKEditorBundle\Form\Type\CKEditorType;

class ConditionGenDeVenteCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ConditionGenDeVente::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('une condition générale de vente')
            ->setEntityLabelInPlural('Liste des conditions générales de ventes')
            ->addFormTheme('@FOSCKEditor/Form/ckeditor_widget.html.twig');
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextareaField::new('description', 'condition générale de vente')
                ->setFormType(CKEditorType::class)
                ->hideOnIndex(),
            TextareaField::new('description', 'condition générale de vente')
                ->setFormType(CKEditorType::class)
                ->hideOnForm()
                ->renderAsHtml(),
        ];
    }
}
