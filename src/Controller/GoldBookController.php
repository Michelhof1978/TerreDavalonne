<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\GoldBook;
use App\Repository\GoldBookRepository;
use App\Form\GoldBookType;
use App\Repository\ParametersGenerauxRepository;
use DateTimeImmutable;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class GoldBookController extends AbstractController
{
    #[Route('/gold/book', name: 'app_gold_book')]
    public function index(Request $request,
        EntityManagerInterface $EntityManager,
        GoldBookRepository $GoldBookRepository,
        ParametersGenerauxRepository $param,
        SessionInterface $sessionInterface): Response
    {
        $book = new GoldBook();

        $form = $this->createForm(GoldBookType::class, $book);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $contactFormData = $form->getData();
            $book->setCreatedAt(new DateTimeImmutable());
            $book->setUserId($this->getUser());
            $book->setIsValid(0);
            $EntityManager->persist($book);
            $EntityManager->flush();

            $this->addFlash('success', 'Votre mot pour le livre d\'or a été pris en compte');

            return $this->redirectToRoute('app_gold_book');
        }

        return $this->render('gold_book/index.html.twig', [
            'books' => $GoldBookRepository->findAllValid(),
            'form' => $form->createView(),
            'param_g' => $param->find(1),
        ]);
    }
}
