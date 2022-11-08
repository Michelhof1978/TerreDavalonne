<?php

namespace App\Controller;

use App\Data\SearchData;
use App\Form\SearchForm;
use App\Repository\EvenementRepository;
use App\Repository\ParametersGenerauxRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AgendaController extends AbstractController
{
    #[Route('/agenda', name: 'app_agenda')]
    public function index(ParametersGenerauxRepository $param, Request $request, EvenementRepository $evenementRepository): Response
    {
        $data = new SearchData();
        $data->page =  (int)$request->query->get('page', 1);
        // On récupère le numéro de page

        $form = $this->createForm(SearchForm::class, $data);
        $form->handleRequest($request);
        $events = $evenementRepository->findSearch($data);

        if($request->get('ajax')){
            return new JsonResponse([
                'content' => $this->renderView('agenda/_events.html.twig', ['events' => $events->getItems()]),
                'pagination' => $this->renderView('agenda/pagination.html.twig', [
                    'pagination' => $events
                ]),
                'pages' => ceil($events->getTotalItemCount() / $events->getItemNumberPerPage()),
            ]);
        }

        return $this->render('agenda/index.html.twig', [
            'events' => $events->getItems(),
            'form' => $form->createView(),
            'pagination' => $events,
            // 'param_g' => $param->find(1),
        ]);
    }
}
