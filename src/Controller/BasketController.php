<?php

namespace App\Controller;

use App\Entity\Product;
use App\Repository\ParametersGenerauxRepository;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class BasketController extends AbstractController
{
    #[Route('/basket', name: 'app_basket')]
    public function index(
        SessionInterface $sessionInterface,
        ProductRepository $productRepository,
        ParametersGenerauxRepository $param
    ): Response {
        $panierCoaching = $sessionInterface->get("panierCoaching", []);

        $dataPanier = [];
        $total = 0;
        $totalTransport = 0;
        $totalTVA = 0;
        $TotalTTC = 0;

        foreach ($panierCoaching as $id => $quantite) {
            $product = $productRepository->find($id);
            $dataPanier[] = [
                "product" => $product,
                "quantite" => $quantite,
            ];
            $total += $product->getPrice() * $quantite;
        }

        $totalTVA = $total *0.2;
        $TotalTTC = $total + $totalTVA + $totalTransport;

        return $this->render('basket/index.html.twig', [
            'dataPanier' => $dataPanier,
            'total' => $total,
            'totalTransport' => $totalTransport,
            'totalTVA' => $totalTVA,
            'totalTTC' => $TotalTTC,
            'controller_name' => 'BasketController',
            'param_g' => $param->find(1),
        ]);
    }

    #[Route('/basket/add/{id}', name: 'app_basket_add_coaching')]
    public function add_coaching(Product $product, SessionInterface $sessionInterface): Response
    {
        $panierCoaching = $sessionInterface->get("panierCoaching", []);
        $id = $product->getId();

        if (array_key_exists($id, $panierCoaching)) {
            $panierCoaching[$id]++;
        } else {
            $panierCoaching[$id] = 1;
        }

        $sessionInterface->set("panierCoaching", $panierCoaching);

        return $this->redirectToRoute('app_basket');
    }

    #[Route('/basket/remove/{id}', name: 'app_basket_remove_coaching')]
    public function remove_coaching(Product $product, SessionInterface $sessionInterface): Response
    {
        $panierCoaching = $sessionInterface->get("panierCoaching", []);
        $id = $product->getId();

        if (array_key_exists($id, $panierCoaching)) {
            if ($panierCoaching[$id] > 1) {
                $panierCoaching[$id]--;
            } else {
                unset($panierCoaching[$id]);
            }
        }

        $sessionInterface->set("panierCoaching", $panierCoaching);

        return $this->redirectToRoute('app_basket');
    }

    #[Route('/basket/delete/{id}', name: 'app_basket_delete_coaching')]
    public function delete_coaching(Product $product, SessionInterface $sessionInterface): Response
    {
        $panierCoaching = $sessionInterface->get("panierCoaching", []);
        $id = $product->getId();

        if (array_key_exists($id, $panierCoaching)) {
            unset($panierCoaching[$id]);
        }

        $sessionInterface->set("panierCoaching", $panierCoaching);

        return $this->redirectToRoute('app_basket');
    }
}
