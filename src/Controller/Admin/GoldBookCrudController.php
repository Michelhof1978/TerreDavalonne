<?php

namespace App\Controller\Admin;

use App\Entity\GoldBook;
use App\Entity\ReponseGoldBook;
use DateTimeImmutable;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Context\AdminContext;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;

class GoldBookCrudController extends AbstractCrudController
{
    public const ACTION_REPONDRE = 'repondre';

    public static function getEntityFqcn(): string
    {
        return GoldBook::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('réponse à un message du livre d\'or')
            ->setEntityLabelInPlural('Liste des messages du livre d\'or')
        ;
    }

    public function configureActions(Actions $actions): Actions
    {
        $repondre = Action::new(self::ACTION_REPONDRE)
            ->linkToCrudAction('repondreGoldBook');

        return $actions
            ->add(Crud::PAGE_INDEX, $repondre)
            ->remove(Crud::PAGE_INDEX, Action::EDIT)
            ->remove(Crud::PAGE_INDEX, Action::DELETE);
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')
                ->hideOnForm(),
            TextField::new('comment')
                ->setLabel('réponse'),
            DateField::new('created_at')
                ->setLabel('date de création')
                ->hideOnForm()
                ->hideOnIndex()
                ->hideOnDetail(),
            BooleanField::new('isValid')
                ->setLabel('message validé (oui/non)'),
        ];
    }

    public function repondreGoldBook(AdminContext $adminContext,
        AdminUrlGenerator $adminUrlGenerator,
        EntityManagerInterface $em
        ): Response
    {
        $goldBook = $adminContext->getEntity()->getInstance();

        $reponseGoldBook = new ReponseGoldBook();
        $reponseGoldBook->setGoldBookId($goldBook);
        $reponseGoldBook->setUserId($adminContext->getUser());
        $reponseGoldBook->setCreatedAt(new DateTimeImmutable());

        parent::persistEntity($em, $reponseGoldBook);

        $url = $adminUrlGenerator->setController(ReponseGoldBookCrudController::class)
            ->setAction(Action::EDIT)
            ->setEntityId($reponseGoldBook->getId())
            ->generateUrl();

        return $this->redirect($url);
    }
}
