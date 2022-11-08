<?php

namespace App\Controller\Admin;

use App\Entity\Newsletter;
use DateTimeImmutable;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TimeField;
use FOS\CKEditorBundle\Form\Type\CKEditorType;

class NewsletterCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Newsletter::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('newsletter')
            ->setEntityLabelInPlural('Liste des newsletters')
            ->setSearchFields(['created_at', 'title'])
            ->setDefaultSort(['created_at' => 'DESC'])
            ->addFormTheme('@FOSCKEditor/Form/ckeditor_widget.html.twig')
        ;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')
                ->hideOnForm(),
            TextField::new('title')
                ->setLabel('titre'),
            TextEditorField::new('content')
                ->hideOnIndex()
                ->setFormType(CKEditorType::class)
                ->setFormTypeOptions([
                    'label' => 'newsletter'
                ]),
            TextareaField::new('content', 'newsletter')
                ->hideOnForm()
                ->renderAsHtml()
                ->setFormType(CKEditorType::class),
            DateTimeField::new('created_at')
                ->setLabel('date de création')
                ->hideOnForm(),
            DateField::new('datePlanif')
                ->setLabel('date d\'envoie'),
            TimeField::new('heurePlanif')
                ->setLabel('heure d\'envoie'),
        ];
    }

    public function persistEntity(EntityManagerInterface $entityManager, $entityInstance): void
    {
        if (!$entityInstance instanceof Newsletter) return;

        $entityInstance->setCreatedAt(new DateTimeImmutable());
        parent::persistEntity($entityManager, $entityInstance);
    }
}
