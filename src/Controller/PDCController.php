<?php

namespace App\Controller;

use App\Repository\ParametersGenerauxRepository;

use App\Repository\PolitiqueConfRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PDCController extends AbstractController
{
    #[Route('/p/d/c', name: 'app_p_d_c')]
    public function index(PolitiqueConfRepository $politiqueConfRepository): Response
    {
        return $this->render('pdc/index.html.twig', [
            'pdc' => $politiqueConfRepository->findOneBy(    ['id' => 'ASC']) !== null ? $politiqueConfRepository->findOneBy(    ['id' => 'ASC'])->getDescription() : [],

        ]);
    }
}
