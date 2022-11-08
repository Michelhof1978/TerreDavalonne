<?php

namespace App\Controller;

use App\Data\SearchData;
use App\Entity\Comment;
use App\Entity\Product;
use App\Form\CommentType;
use App\Form\SearchForm;
use App\Repository\ParametersGenerauxRepository;
use App\Repository\ProductRepository;
use DateTimeImmutable;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductsController extends AbstractController
{
    #[Route('/products', name: 'app_products')]
    public function index(ParametersGenerauxRepository $param,
    Request $request,
    ProductRepository $productRepository): Response
    {
        $data = new SearchData();
        $data->page =  (int)$request->query->get('page', 1);

        $form = $this->createForm(SearchForm::class, $data);
        $form->handleRequest($request);
        $products = $productRepository->findSearch($data);

        if($request->get('ajax')){
            return new JsonResponse([
                'content' => $this->renderView('products/_products.html.twig', ['products' => $products->getItems()]),
                'pagination' => $this->renderView('products/pagination.html.twig', [
                    'pagination' => $products
                ]),
                'pages' => ceil($products->getTotalItemCount() / $products->getItemNumberPerPage()),
            ]);
        }
        return $this->render('products/index.html.twig', [
            'products' => $products->getItems(),
            'form' => $form->createView(),
            'pagination' => $products,
            // 'param_g' => $param->find(1),
        ]);
    }

    #[Route('/products/details/{id}', name: 'app_products_details')]
    public function productsDetails(Product $product, Request $request, EntityManagerInterface $entityManager): Response
    {
        $comment = new Comment();

        $form = $this->createForm(CommentType::class, $comment);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $comment->setCreatedAt(new DateTimeImmutable());
            $comment->setUser($this->getUser());
            $comment->setIsValid(0);
            $comment->setProduct($product);
            $entityManager->persist($comment);
            $entityManager->flush();

            $this->addFlash('success', 'Votre commentaire a été pris en compte');

            return $this->redirectToRoute('app_products');
        }

        return $this->render('products/productsDetails/index.html.twig', [
            'product' => $product,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/shop', name: 'app_shop')]
    public function shop(ParametersGenerauxRepository $param,
                         Request $request,
                         ProductRepository $productRepository): Response
    {
        $data = new SearchData();
        $data->page =  (int)$request->query->get('page', 1);

        $form = $this->createForm(SearchForm::class, $data);
        $form->handleRequest($request);
        $products = $productRepository->findSearch($data);

        if($request->get('ajax')){
            return new JsonResponse([
                'content' => $this->renderView('products/_products.html.twig', ['products' => $products->getItems()]),
                'pagination' => $this->renderView('products/pagination.html.twig', [
                    'pagination' => $products
                ]),
                'pages' => ceil($products->getTotalItemCount() / $products->getItemNumberPerPage()),
            ]);
        }
        return $this->render('shop/index.html.twig', [
            'products' => $products->getItems(),

        ]);
    }
}
