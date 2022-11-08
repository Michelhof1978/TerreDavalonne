<?php

namespace App\Controller\Admin;

use App\Entity\PlanteOption;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use FOS\CKEditorBundle\Form\Type\CKEditorType;

class PlanteOptionCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return PlanteOption::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('contenu d\'une plante')
            ->setEntityLabelInPlural('Liste des contenus des plantes')
            ->addFormTheme('@FOSCKEditor/Form/ckeditor_widget.html.twig')
        ;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')
                ->hideOnForm(),
            AssociationField::new('plante')
                ->setLabel('plante associée'),
            AssociationField::new('type')
                ->setLabel('le type de contenu associé'),
            TextEditorField::new('content')
            ->setFormType(CKEditorType::class)
            ->hideOnIndex()
            ->setFormTypeOptions([
                'label' => 'qui sommes nous ?'
            ]),
            TextareaField::new('content', 'Le contenu du type selectionné')
            ->setFormType(CKEditorType::class)
            ->hideOnForm()
            ->renderAsHtml(),
        ];
    }
}
