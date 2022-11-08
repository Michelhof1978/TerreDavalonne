<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Comment;
use App\Repository\CommentRepository;
use App\Form\CommentType;
use App\Repository\ParametersGenerauxRepository;
use DateTimeImmutable;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class CommentController extends AbstractController
{
    #[Route('/comment', name: 'app_comment')]
    public function index(Request $request,
        EntityManagerInterface $EntityManager,
        CommentRepository $commentRepository,
        ParametersGenerauxRepository $param,
        SessionInterface $sessionInterface): Response
    {
        $comment = new Comment();

        $form = $this->createForm(CommentType::class, $comment);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $contactFormData = $form->getData();
            $comment->setCreatedAt(new DateTimeImmutable());
            $comment->setUser($this->getUser());
            $comment->setIsValid(0);
            $EntityManager->persist($comment);
            $EntityManager->flush();

            $this->addFlash('success', 'Votre commentaire a été pris en compte');

            return $this->redirectToRoute('app_comment');
        }

        return $this->render('commentaire/index.html.twig', [
            'comments' => $commentRepository->findAllValid(),
            'form' => $form->createView(),
            'param_g' => $param->find(1),
        ]);
    }
}
