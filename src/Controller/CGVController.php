<?php

namespace App\Controller;

use App\Entity\ConditionGenDeVente;
use App\Repository\ConditionGenDeVenteRepository;
use App\Repository\ParametersGenerauxRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CGVController extends AbstractController
{
    #[Route('/c/g/v', name: 'app_c_g_v')]
    public function index(ConditionGenDeVenteRepository $conditionGenDeVenteRepository): Response
    {
        return $this->render('cgv/index.html.twig', [
            'cgv' => $conditionGenDeVenteRepository->findOneBy(    ['id' => 'ASC']) !== null ? $conditionGenDeVenteRepository->findOneBy(    ['id' => 'ASC'])->getDescription() : [],
        ]);
    }
}
