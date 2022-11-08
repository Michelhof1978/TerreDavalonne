<?php

namespace App\Controller;

use App\Data\SearchData;
use App\Form\SearchForm;
use App\Repository\ParametersGenerauxRepository;
use App\Repository\RecueilRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RecueilController extends AbstractController
{
    #[Route('/recueil', name: 'app_recueil')]
    public function index(
        ParametersGenerauxRepository $param,
        Request $request,
        RecueilRepository $recueilRepository,
    ): Response {
        $data = new SearchData();
        $data->page =  (int)$request->query->get('page', 1);
        // On récupère le numéro de page

        $form = $this->createForm(SearchForm::class);
        $form = $this->createForm(SearchForm::class, $data);
        $form->handleRequest($request);
        $recueils = $recueilRepository->findSearch($data);

        // On vérifie si on a une requête Ajax
        if ($request->get('ajax')) {
            return new JsonResponse([
                'content' => $this->renderView('recueil/_recueils.html.twig', ['recueils' => $recueils->getItems()]),
                'pagination' => $this->renderView('recueil/pagination.html.twig', [
                    'pagination' => $recueils
                ]),
                'pages' => ceil($recueils->getTotalItemCount() / $recueils->getItemNumberPerPage()),
            ]);
        }

        return $this->render('recueil/index.html.twig', [
            'recueils' => $recueils->getItems(),
            'form' => $form->createView(),
            'pagination' => $recueils,
            'param_g' => $param->find(1),
        ]);
    }

    #[Route('/ajax', name: 'ajax_action')]
    public function ajaxAction(
        Request $request
    ): Response {
        /* on récupère la valeur envoyée */
        $idSelect = $request->request->get('ajax');
        $info = match ($idSelect) {
            0 => 'Page 1',
            1 => 'Page 2',
            2 => 'Page 3',
            default => 'La page n\'existe pas',
        };

        /* On renvoie une réponse encodée en JSON */
        $response = new Response(json_encode(array(
            'info' => $info
        )));
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }
}
