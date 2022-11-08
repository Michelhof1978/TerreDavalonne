<?php

namespace App\Controller\Admin;

use App\Entity\FAQCoaching;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class FAQCoachingCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return FAQCoaching::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('un FAQ Coaching')
            ->setEntityLabelInPlural('Liste des FAQs pour le coaching')
        ;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('question')
                ->setLabel('question'),
            TextField::new('reponse')
                ->setLabel('réponse'),
        ];
    }
}
