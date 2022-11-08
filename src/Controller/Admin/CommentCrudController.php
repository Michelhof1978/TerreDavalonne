<?php

namespace App\Controller\Admin;

use App\Entity\Comment;
use App\Entity\ReponseComment;
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

class CommentCrudController extends AbstractCrudController
{
    public const ACTION_REPONDRE = 'repondre';

    public static function getEntityFqcn(): string
    {
        return Comment::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('réponse à un commentaire')
            ->setEntityLabelInPlural('Liste des commentaires');
    }

    public function configureActions(Actions $actions): Actions
    {
        $repondre = Action::new(self::ACTION_REPONDRE)
            ->linkToCrudAction('repondreComment');

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

    public function repondreComment(
        AdminContext $adminContext,
        AdminUrlGenerator $adminUrlGenerator,
        EntityManagerInterface $em
    ): Response {
        $comment = $adminContext->getEntity()->getInstance();

        $reponseComment = new ReponseComment();
        $reponseComment->setComment($comment);
        $reponseComment->setUser($adminContext->getUser());
        $reponseComment->setCreatedAt(new DateTimeImmutable());

        parent::persistEntity($em, $reponseComment);

        $url = $adminUrlGenerator->setController(ReponseCommentCrudController::class)
            ->setAction(Action::EDIT)
            ->setEntityId($reponseComment->getId())
            ->generateUrl();

        return $this->redirect($url);
    }
}
