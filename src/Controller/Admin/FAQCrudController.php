<?php

namespace App\Controller\Admin;

use App\Entity\FAQ;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class FAQCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return FAQ::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('un FAQ')
            ->setEntityLabelInPlural('Liste des FAQs')
        ;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('question')
                ->setLabel('question'),
            TextField::new('response')
                ->setLabel('réponse'),
        ];
    }
}
