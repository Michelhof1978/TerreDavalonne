<?php

namespace App\Controller;

use App\Repository\ParametersGenerauxRepository;
use App\Repository\QuiSommesNousRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class WhoAreWeController extends AbstractController
{
    #[Route('/who/are/we', name: 'app_who_are_we')]
    public function index(QuiSommesNousRepository $quiSommesNousRepository, ParametersGenerauxRepository $param): Response
    {
        return $this->render('who_are_we/index.html.twig', [
            'quisommesnous' => $quiSommesNousRepository->findAll(),
            'param_g' => $param->find(1),
        ]);
    }
}
