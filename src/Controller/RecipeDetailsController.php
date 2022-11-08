<?php

namespace App\Controller;

use App\Entity\Comment;
use App\Entity\Recette;
use App\Form\CommentType;
use App\Repository\ParametersGenerauxRepository;
use DateTimeImmutable;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RecipeDetailsController extends AbstractController
{
    #[Route('/recipe/details/{id}', name: 'app_recipe_details')]
    public function index(ParametersGenerauxRepository $param, Recette $recette,
    Request $request,
    EntityManagerInterface $entityManager): Response
    {
        $comment = new Comment();
        
        $form = $this->createForm(CommentType::class, $comment);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $comment->setCreatedAt(new DateTimeImmutable());
            $comment->setUser($this->getUser());
            $comment->setIsValid(0);
            $comment->setRecette($recette);
            $entityManager->persist($comment);
            $entityManager->flush();

            $this->addFlash('success', 'Votre commentaire a été pris en compte');

            return $this->redirectToRoute('app_recipe');
        }

        return $this->render('recipe_details/index.html.twig', [
            'recette' => $recette,
            'form' => $form->createView(),
            'param_g' => $param->find(1),
        ]);
    }
}
