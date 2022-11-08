<?php

namespace App\Controller;

use App\Repository\FAQRepository;
use App\Repository\ParametersGenerauxRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FaqsController extends AbstractController
{
    #[Route('/faqs', name: 'app_faqs')]
    public function index(FAQRepository $fAQRepository, ParametersGenerauxRepository $param): Response
    {
        return $this->render('faqs/index.html.twig', [
            'faqs' => $fAQRepository->findAll(),
            'param_g' => $param->find(1),
        ]);
    }
}
