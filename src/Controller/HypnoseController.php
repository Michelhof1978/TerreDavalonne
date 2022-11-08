<?php

namespace App\Controller;

use App\Repository\HypnoseRepository;
use App\Repository\ParametersGenerauxRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HypnoseController extends AbstractController
{
      #[Route('/hypnose', name: 'app_hypnose')]
    public function index(HypnoseRepository $hypnoseRepository): Response
    {
        return $this->render('hypnose/index.html.twig', [
            'hypnose' => $hypnoseRepository->findOneBy(['id' => 1]) !== null ? $hypnoseRepository->findOneBy(['id' => 1])->getDescription() : [],
        ]);
    }
}
