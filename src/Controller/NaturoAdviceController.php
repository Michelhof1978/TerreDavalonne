<?php

namespace App\Controller;

use App\Data\SearchData;
use App\Form\SearchForm;
use App\Repository\ConseilDuNaturoRepository;
use App\Repository\ParametersGenerauxRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NaturoAdviceController extends AbstractController
{
    #[Route('/naturo/advice', name: 'app_naturo_advice')]
    public function index(
        ParametersGenerauxRepository $param,
        ConseilDuNaturoRepository $conseilDuNaturoRepository,
        Request $request
    ): JsonResponse|Response
    {
        $data = new SearchData();
        $data->page =  (int)$request->query->get('page', 1);
        // On récupère le numéro de page

        $form = $this->createForm(SearchForm::class, $data);
        $form->handleRequest($request);
        $conseils = $conseilDuNaturoRepository->findSearch($data);

        // $pagination = $paginator->paginate(
        //     $conseils, /* query NOT result */
        //     $request->query->getInt('page', 1), /*page number*/
        //     6 /*limit per page*/
        // );

        // $pagination->setCustomParameters([
        //     'align' => 'center',
        // ]);

        // On récupère les annonces de la page en fonction du filtre

        // On vérifie si on a une requête Ajax
        if($request->get('ajax')){
            return new JsonResponse([
                'content' => $this->renderView('naturo_advice/_conseils.html.twig', ['conseils' => $conseils->getItems()]),
                'pagination' => $this->renderView('naturo_advice/pagination.html.twig', [
                    'pagination' => $conseils
                ]),
                'pages' => ceil($conseils->getTotalItemCount() / $conseils->getItemNumberPerPage()),
            ]);
        }/*       if($request->get('page')){
            return new JsonResponse([
                'content' => $this->renderView('naturo_advice/_conseils.html.twig',
                [
                    'conseils' => $conseils->getItems(),
                    'pagination' => $conseils,
                ])
            ]);
        }*/

        return $this->render('naturo_advice/index.html.twig', [
            'conseils' => $conseils->getItems(),
            'form' => $form->createView(),
            'pagination' => $conseils,
            // 'param_g' => $param->find(1),
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
