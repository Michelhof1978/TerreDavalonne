<?php

namespace App\Controller\Admin;

use App\Entity\Product;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\UrlField;
use FOS\CKEditorBundle\Form\Type\CKEditorType;

class ProductCrudController extends AbstractCrudController
{
    public const PRODUCTS_BASE_PATH = 'images/products';
    public const PRODUCTS_UPLOAD_DIR = 'public/images/products/';

    public static function getEntityFqcn(): string
    {
        return Product::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('un produit')
            ->setEntityLabelInPlural('Liste des produits')
            ->setSearchFields(['categoryId', 'name'])
            ->setDefaultSort(['categoryId' => 'ASC', 'name' => 'ASC'])
            ->addFormTheme('@FOSCKEditor/Form/ckeditor_widget.html.twig');
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            AssociationField::new('categoryId')
                ->setLabel('catégorie'),
            TextField::new('name')
                ->setLabel('nom du produit'),
            AssociationField::new('elementBase')
                ->setLabel('élément de base'),
            AssociationField::new('elementPhyto')
                ->setLabel('élément phytosanitaire'),
            AssociationField::new('elementSabbat')
                ->setLabel('élément sabbat'),
            TextField::new('reference')
                ->setLabel('référence'),
            MoneyField::new('price')
                ->setLabel('prix')
                ->setCurrency('EUR'),
            NumberField::new('poids'),
            TextareaField::new('description')
                ->setFormType(CKEditorType::class),
            DateTimeField::new('created_at')
                ->hideOnForm()
                ->setLabel('date de création'),
            DateTimeField::new('update_at')
                ->hideOnForm()
                ->setLabel('date de modification'),
            ImageField::new('imageHeader')
                ->setLabel('ajouter une photo d\'entête aux produits')
                ->setBasePath(self::PRODUCTS_BASE_PATH)
                ->setUploadDir(self::PRODUCTS_UPLOAD_DIR),
            UrlField::new('videoHeader')
                ->setLabel('vidéo d\'entête de plante'),
            AssociationField::new('options')
                ->setLabel('liste des contenus'),
        ];
    }
}
