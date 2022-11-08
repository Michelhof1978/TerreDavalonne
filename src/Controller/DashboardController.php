<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
#[Route('/dashboard', name: 'app_dashboard')]
class DashboardController extends AbstractController
{
    #[Route('/home', name: '_home')]
    public function index(): Response
    {
        return $this->render('dashboard/dashboard_base.html.twig', [
            'controller_name' => 'DashboardController',
        ]);
    }
    #[Route('/orders', name: '_orders')]
    public function indexOrders(): Response
    {
        return $this->render('dashboard/_dashboard_orders.html.twig', [
            'controller_name' => 'DashboardController',
        ]);
    }
    #[Route('/formations', name: '_formations')]
    public function indexFormations(): Response
    {
        return $this->render('dashboard/_dashboard_formations.html.twig', [
            'controller_name' => 'DashboardController',
        ]);
    }
    #[Route('/events', name: '_event')]
    public function indexEvents(): Response
    {
        return $this->render('dashboard/_dashboard_events.html.twig', [
            'controller_name' => 'DashboardController',
        ]);
    }
    #[Route('/products', name: '_products')]
    public function indexProducts(): Response
    {
        return $this->render('dashboard/_dashboard_products.html.twig', [
            'controller_name' => 'DashboardController',
        ]);
    }
    #[Route('/details', name: '_infos')]
    public function indexInfos(): Response
    {
        return $this->render('dashboard/_dashboard_info.html.twig', [
            'controller_name' => 'DashboardController',
        ]);
    }
    #[Route('/support', name: '_support')]
    public function indexSupport(): Response
    {
        return $this->render('dashboard/_dashboard_support.html.twig', [
            'controller_name' => 'DashboardController',
        ]);
    }
    #[Route('/settings', name: '_settings')]
    public function indexSettings(): Response
    {
        return $this->render('dashboard/_dashboard_settings.html.twig', [
            'controller_name' => 'DashboardController',
        ]);
    }
}
