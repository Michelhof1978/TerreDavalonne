<?php

namespace App\Controller;

use App\Data\SearchData;
use App\Entity\Comment;
use App\Entity\Plante;
use App\Form\SearchForm;
use App\Form\CommentType;
use App\Repository\ParametersGenerauxRepository;
use App\Repository\PlanteRepository;
use DateTimeImmutable;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PlantesController extends AbstractController
{
    #[Route('/plantes', name: 'app_plantes')]
    public function index(ParametersGenerauxRepository $param,
    Request $request,
    PlanteRepository $planteRepository,
    ): Response
    {
        $data = new SearchData();
        $data->page =  (int)$request->query->get('page', 1);

        $form = $this->createForm(SearchForm::class, $data);
        $form->handleRequest($request);
        $plantes = $planteRepository->findSearch($data);

        if($request->get('ajax')){
            return new JsonResponse([
                'content' => $this->renderView('plantes/_plantes.html.twig', ['plantes' => $plantes->getItems()]),
                'pagination' => $this->renderView('plantes/pagination.html.twig', [
                    'pagination' => $plantes
                ]),
                'pages' => ceil($plantes->getTotalItemCount() / $plantes->getItemNumberPerPage()),
            ]);
        }

        return $this->render('plantes/index.html.twig', [
            'plantes' => $plantes->getItems(),
            'form' => $form->createView(),
            'pagination' => $plantes,
            // 'param_g' => $param->find(1),
        ]);
    }

    #[Route('/plantes/details/{id}', name: 'app_plantes_details')]
    public function plantsDetails(Plante $plante, Request $request, EntityManagerInterface $entityManager): Response
    {
        $comment = new Comment();

        $form = $this->createForm(CommentType::class, $comment);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $comment->setCreatedAt(new DateTimeImmutable());
            $comment->setUser($this->getUser());
            $comment->setIsValid(0);
            $comment->setPlante($plante);
            $entityManager->persist($comment);
            $entityManager->flush();

            $this->addFlash('success', 'Votre commentaire a été pris en compte');

            return $this->redirectToRoute('app_plantes');
        }

        return $this->render('plantes/plantsDetails/index.html.twig', [
            'plante' => $plante,
            'form' => $form->createView(),
        ]);
    }
}
