<?php

namespace App\Controller;

use App\Repository\ParametersGenerauxRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class OneGreenMagicController extends AbstractController
{
    #[Route('/one/green/magic', name: 'app_one_green_magic')]
    public function index(ParametersGenerauxRepository $param): Response
    {
        return $this->render('one_green_magic/index.html.twig', [
            'controller_name' => 'OneGreenMagicController',
            'param_g' => $param->find(1),
        ]);
    }
}
