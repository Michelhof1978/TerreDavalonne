<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class QiGongController extends AbstractController
{
    #[Route('/qi/gong', name: 'app_qi_gong')]
    public function index(): Response
    {
        return $this->render('qi_gong/index.html.twig', [
            'controller_name' => 'QiGongController',
        ]);
    }
}
