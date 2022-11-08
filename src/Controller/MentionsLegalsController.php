<?php

namespace App\Controller;

use App\Repository\MentionLegaleRepository;
use App\Repository\ParametersGenerauxRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MentionsLegalsController extends AbstractController
{
    #[Route('/mentions/legals', name: 'app_mentions_legals')]
    public function index(MentionLegaleRepository $mention , ParametersGenerauxRepository $param): Response
    {
        return $this->render('mentions_legales/index.html.twig', [
            'mention' => $mention->findOneBy(    ['id' => 'ASC']) !== null ? $mention->findOneBy(    ['id' => 'ASC'])->getDescription() : [],
            'param_g' => $param->find(1),
        ]);
    }
}
