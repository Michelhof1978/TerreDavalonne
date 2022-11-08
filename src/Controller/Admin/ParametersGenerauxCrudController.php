<?php

namespace App\Controller\Admin;

use App\Entity\ParametersGeneraux;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TelephoneField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\UrlField;

class ParametersGenerauxCrudController extends AbstractCrudController
{
    public const LOGO_BASE_PATH = 'upload/images/logo';
    public const LOGO_UPLOAD_DIR = 'public/upload/images/logo';

    public static function getEntityFqcn(): string
    {
        return ParametersGeneraux::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('paramètres généraux')
            ->setEntityLabelInPlural('Liste des paramètres généraux');
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->remove(Crud::PAGE_INDEX, Action::NEW)
            ->remove(Crud::PAGE_INDEX, Action::DELETE);
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('siteName')
                ->setLabel('Nom du site'),
            ImageField::new('logo')
                ->setLabel('chargement du logo')
                ->setBasePath(self::LOGO_BASE_PATH)
                ->setUploadDir(self::LOGO_UPLOAD_DIR)
                ->setSortable(false),
            TextField::new('adress')
                ->setLabel('adresse'),
            TextField::new('zip')
                ->setLabel('code postal'),
            TextField::new('city')
                ->setLabel('ville'),
            TelephoneField::new('phoneNumber')
                ->setLabel('numéro de téléphone'),
            EmailField::new('emailContact')
                ->setLabel('email'),
            UrlField::new('lienYoutube')
                ->setLabel('lien Youtube'),
            UrlField::new('lienInstagram')
                ->setLabel('lien Instagram'),
            UrlField::new('lienMeta')
                ->setLabel('lien Facebook/Meta'),
            UrlField::new('lienTiktok')
                ->setLabel('lien Tiktok'),
        ];
    }
}
