<?php

namespace App\Controller\Admin;

use App\Entity\PlanteImage;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;

class PlanteImageCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return PlanteImage::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')
                ->hideOnForm(),
            ImageField::new('name')
                ->setLabel('image')
                ->setBasePath('images/plantes')
                ->setUploadDir('public/images/plantes/'),
            AssociationField::new('plante'),
        ];
    }
}
