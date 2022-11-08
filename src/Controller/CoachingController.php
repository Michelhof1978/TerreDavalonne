<?php

namespace App\Controller;

use App\Data\DateCoachingData;
use App\Form\DateCoachingForm;
use App\Repository\CreneauCoatchingRepository;
use App\Repository\FAQCoachingRepository;
use App\Repository\ProductRepository;
use Symfony\Component\HttpFoundation\Request;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CoachingController extends AbstractController
{
    #[Route('/coaching', name: 'app_coaching')]
    public function index(FAQCoachingRepository $fAQCoachingRepository,
     ProductRepository $productRepository,
     CreneauCoatchingRepository $creneauCoatchingRepository,
     Request $request): Response
    {
        $dateCoachingSearch = new DateCoachingData();
        $dateinit = new DateTime('2022/07/12');
        $dateinit->modify('2022/07/12');
        $dateCoachingSearch->date = $dateinit;;
        $form = $this->createForm(DateCoachingForm::class, $dateCoachingSearch);
        $form->handleRequest($request);

        $products = $productRepository->findBy(['categoryId' => 2]);
        $creneaux = $creneauCoatchingRepository->findBy(['date' => $dateCoachingSearch->date]);

        return $this->render('coaching/index.html.twig', [
            'faqs' => $fAQCoachingRepository->findAll(),
            'creneaux' => [],
            'products' => $products,
            'form' => $form->createView(),
            'controller_name' => 'CoachingController',
        ]);
    }
}
