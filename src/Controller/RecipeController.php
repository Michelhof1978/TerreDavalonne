<?php

namespace App\Controller;

use App\Data\SearchData;
use App\Form\SearchForm;
use App\Repository\ParametersGenerauxRepository;
use App\Repository\RecetteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RecipeController extends AbstractController
{
    #[Route('/recipe', name: 'app_recipe')]
    public function index(ParametersGenerauxRepository $param, Request $request, RecetteRepository $recetteRepository): Response
    {
        $data = new SearchData();
        $data->page =  (int)$request->query->get('page', 1);
        // On récupère le numéro de page

        $form = $this->createForm(SearchForm::class, $data);
        $form->handleRequest($request);
        $recettes = $recetteRepository->findSearch($data);

        // On vérifie si on a une requête Ajax
        if ($request->get('ajax')) {
            return new JsonResponse([
                'content' => $this->renderView('recipe/_recipes.html.twig', ['recettes' => $recettes->getItems()]),
                'pagination' => $this->renderView('recipe/pagination.html.twig', [
                    'pagination' => $recettes
                ]),
                'pages' => ceil($recettes->getTotalItemCount() / $recettes->getItemNumberPerPage()),
            ]);
        }
        return $this->render('recipe/index.html.twig', [
            'recettes' => $recettes->getItems(),
            'form' => $form->createView(),
            'pagination' => $recettes,
            // 'param_g' => $param->find(1),
        ]);
    }
}
