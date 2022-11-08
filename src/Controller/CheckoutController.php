<?php

namespace App\Controller;

use App\Repository\ParametersGenerauxRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CheckoutController extends AbstractController
{
    #[Route('/checkout', name: 'app_checkout')]
    public function index(ParametersGenerauxRepository $param): Response
    {
        return $this->render('checkout/index.html.twig', [
            'controller_name' => 'CheckoutController',
            'param_g' => $param->find(1),
        ]);
    }
}
