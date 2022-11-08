<?php

namespace App\Controller;

use App\Data\SearchData;
use App\Entity\Comment;
use App\Entity\MagieVerte;
use App\Form\CommentType;
use App\Form\SearchForm;
use App\Repository\MagieVerteRepository;
use App\Repository\ParametersGenerauxRepository;
use DateTimeImmutable;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GreenMagicController extends AbstractController
{
    #[Route('/green/magic', name: 'app_green_magic')]
    public function index(ParametersGenerauxRepository $param,
    Request $request,
    MagieVerteRepository $magieVerteRepository): Response
    {
        $data = new SearchData();
        $data->page =  (int)$request->query->get('page', 1);

        $form = $this->createForm(SearchForm::class, $data);
        $form->handleRequest($request);
        $magieVertes = $magieVerteRepository->findSearch($data);

        if($request->get('ajax')){
            return new JsonResponse([
                'content' => $this->renderView('green_magic/_magieVertes.html.twig', ['magieVertes' => $magieVertes->getItems()]),
                'pagination' => $this->renderView('green_magic/pagination.html.twig', [
                    'pagination' => $magieVertes
                ]),
                'pages' => ceil($magieVertes->getTotalItemCount() / $magieVertes->getItemNumberPerPage()),
            ]);
        }

        return $this->render('green_magic/index.html.twig', [
            'magieVertes' => $magieVertes->getItems(),
            'form' => $form->createView(),
            'pagination' => $magieVertes,
            // 'param_g' => $param->find(1),
        ]);
    }

    #[Route('/green/magic/{id}', name: 'app_green_magic_details')]
    public function plantsDetails(MagieVerte $magieVerte, Request $request, EntityManagerInterface $entityManager): Response
    {
        $comment = new Comment();
        
        $form = $this->createForm(CommentType::class, $comment);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $comment->setCreatedAt(new DateTimeImmutable());
            $comment->setUser($this->getUser());
            $comment->setIsValid(0);
            $comment->setMagieVerte($magieVerte);
            $entityManager->persist($comment);
            $entityManager->flush();

            $this->addFlash('success', 'Votre commentaire a été pris en compte');

            return $this->redirectToRoute('app_green_magic');
        }

        return $this->render('green_magic/magieVerteDetails/index.html.twig', [
            'magieVerte' => $magieVerte,
            'form' => $form->createView(),
        ]);
    }
}
